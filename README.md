# administracion_salas_de_juntas

## The final version of the system is located in the final branch

this is how the main page looks like 

![Screenshot 2023-02-19 220349](https://user-images.githubusercontent.com/99617631/220006834-091c8826-29f1-470b-9abc-731e10985bef.jpg)

to create a new room you will be presented with the following form

![image](https://user-images.githubusercontent.com/99617631/220007228-bac43dee-8a54-47d1-a406-b321f4af29cf.png)

after you have created a new room, you will see a success message and it will be displayed in the main table

![image](https://user-images.githubusercontent.com/99617631/220007139-f5b4f0ce-e65c-4417-9aab-be7a7dff6d2a.png)

the drop button will make available an occupied room

![image](https://user-images.githubusercontent.com/99617631/220007311-a6773718-b8d1-418a-8c7d-5e97b0275dd1.png)

with the reserve button you will be presented with the following form, be mindful to use the format YYYY-MM-DD HH:MM:SS

![image](https://user-images.githubusercontent.com/99617631/220007373-7105c6fc-bbc3-444b-8e96-a267234d04c3.png)

once completed you will see the results displayed in the main table

![image](https://user-images.githubusercontent.com/99617631/220007439-71d50781-dc27-4b49-856c-ffa2f1bd5dc4.png)

once a room is occupied, you cannot reserve it therefore you will be presented with the following alert 

![image](https://user-images.githubusercontent.com/99617631/220007531-6e3a32fa-b729-4cc9-adb1-f0154a1ca17d.png)

the delete button with permanently a room

![image](https://user-images.githubusercontent.com/99617631/220007629-b0a3764c-e83e-4110-a8cf-a0c41686a088.png)

you can see the values of a room with the show button 

![image](https://user-images.githubusercontent.com/99617631/220007688-c1b83533-9fc2-4761-b867-104f28618dd5.png)

if you try to reserve a room for more than 2 hours, you will get the following alert

![image](https://user-images.githubusercontent.com/99617631/220007875-a64399eb-b9b7-413d-afe3-abc6e9e292d7.png)

the following command is used to excecute the crontab: php artisan schedule:work
witch will be validating if the departure time has exceded, and if so, it will automatically mark the room as available

![image](https://user-images.githubusercontent.com/99617631/220008262-4c4fc96e-e126-4761-9f53-360dfdd999c5.png)
