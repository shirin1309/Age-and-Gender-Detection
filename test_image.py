import cv2
import numpy as np
from keras.preprocessing.image import img_to_array
from keras.models import load_model
import os

image=cv2.imread("input\\test.jpg")
		
		
output = np.copy(image)
image = cv2.resize(image, (96,96))
image = image.astype("float") / 255.0
image = img_to_array(image)
image = np.expand_dims(image, axis=0)
		
model = load_model("gender.hdf5")
		
confidence = model.predict(image)[0]
		
classes = ["Male", "Female"]    
idx = np.argmax(confidence)
label = classes[idx]
"""label = "{}: {:.2f}%".format(label, confidence[idx] * 100)
cv2.putText(output, label, (10, 25),  cv2.FONT_HERSHEY_SIMPLEX,
					0.7, (0, 255, 0), 2)"""
					
#cv2.imwrite("gender_out.jpg",output)
		
#image=cv2.imread("gender_out.jpg")
image=output
print(image.shape)
					
					
AGE_BUCKETS = ["(0-2)", "(4-6)", "(8-12)", "(15-20)", "(25-32)","(38-43)", "(48-53)", "(60-100)"]
		
prototxtPath = os.path.sep.join(["face_model", "deploy.prototxt"])
weightsPath = os.path.sep.join(["face_model","res10_300x300_ssd_iter_140000.caffemodel"])
faceNet = cv2.dnn.readNet(prototxtPath, weightsPath)
		
prototxtPath = os.path.sep.join(["age_model", "age_deploy.prototxt"])
weightsPath = os.path.sep.join(["age_model", "age_model.hdf5"])
ageNet = cv2.dnn.readNet(prototxtPath, weightsPath)
		
(h, w) = image.shape[:2]
blob = cv2.dnn.blobFromImage(image, 1.0, (300, 300),(104.0, 177.0, 123.0))
		
faceNet.setInput(blob)
detections = faceNet.forward()
		
for i in range(0, detections.shape[2]):

	confidence = detections[0, 0, i, 2]
	
	if confidence > 0.5:
		box = detections[0, 0, i, 3:7] * np.array([w, h, w, h])
		(startX, startY, endX, endY) = box.astype("int")
		
		face = image[startY:endY, startX:endX]
		faceBlob = cv2.dnn.blobFromImage(face, 1.0, (227, 227),
			(78.4263377603, 87.7689143744, 114.895847746),
			swapRB=False)
					
		ageNet.setInput(faceBlob)
		preds = ageNet.forward()
		i = preds[0].argmax()
		age = AGE_BUCKETS[i]
		ageConfidence = preds[0][i]
				
		text = "{}".format(label+" "+age)
		print("[INFO] {}".format(text))

		y = startY - 10 if startY - 10 > 10 else startY + 10
		cv2.rectangle(output, (startX, startY), (endX, endY),(0, 0, 255), 2)
		cv2.putText(output, text, (startX-5, y+110),cv2.FONT_HERSHEY_SIMPLEX, 0.50, (0, 0, 255), 2)
cv2.imwrite("output\\output.jpg",output)					
#cv2.imshow("Gender", output)
#cv2.waitKey(0)
cv2.destroyAllWindows()
	