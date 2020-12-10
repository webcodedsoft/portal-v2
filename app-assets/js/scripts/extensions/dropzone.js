/*=========================================================================================
    File Name: dropzone.js
    Description: dropzone
    --------------------------------------------------------------------------------------
    Item Name: Modern Admin - Clean Bootstrap 4 Dashboard HTML Template
    Version: 1.0
    Author: PIXINVENT
    Author URL: http://www.themeforest.net/user/pixinvent
==========================================================================================*/
 
/*Passport*/
Dropzone.options.dpzSingleFile = {
    paramName: "passportfile", // The name that will be used to transfer the file
    maxFilesize: 0.2, // MB
    maxFiles: 1,
    autoProcessQueue: false,
     addRemoveLinks: true,
    dictRemoveFile: " Trash",
    dictInvalidFileType: "upload only JPG/PNG/JPEG",
    acceptedFiles: '.png,.jpg,.jpeg',
    init: function() {

        var _this = this;

        this.on("maxfilesexceeded", function(file) {
            this.removeAllFiles();
            this.addFile(file);
        });


        var submitButton = document.querySelector('#passportbtn');
            myDropzone = this;
             submitButton.addEventListener("click", function(){
                 myDropzone.processQueue();
             });


        this.on("success", function(file, response){
              if (this.getQueuedFiles().length == 0 && this.getUploadingFiles().length == 0) 
              {
                var _this = this;
               // _this.removeAllFiles();
               //alert(response);
              }
              console.log(this.getUploadingFiles());
              //location.reload();
            });

    }
};

/********************************************
*        Multiple Files Olevel             *
********************************************/
Dropzone.options.dpzMultipleFiles = {
    paramName: "olevelfile", // The name that will be used to transfer the file
    maxFilesize: 0.2, // MB
    maxFiles: 2,
    maxThumbnailFilesize: 2, // MB
    dictMaxFilesExceeded: "Maximum upload limit reached",
    autoProcessQueue: false,
     addRemoveLinks: true,
    dictRemoveFile: " Trash",
    parallelUploads: 10,
    uploadMultiple: true,
    dictInvalidFileType: "upload only JPG/PNG/JPEG",
    acceptedFiles: '.png,.jpg,.jpeg',
    init: function() {

        var _this = this;

        this.on("maxfilesexceeded", function(file) {
            this.removeAllFiles();
            this.addFile(file);
        });



         var submitButtons = document.querySelector('#olevelbtn');
            myDropzones = this;
             submitButtons.addEventListener("click", function(){
                 myDropzones.processQueue();
             });


        this.on("success", function(file, response){
              if (this.getQueuedFiles().length == 0 && this.getUploadingFiles().length == 0) 
              {
                var _this = this;
               // _this.removeAllFiles();
              }
              console.log(this.getUploadingFiles());
              //location.reload();
            });

    }
}




/****************************************************************
*              Jamb                *
****************************************************************/
Dropzone.options.dpzFileLimits = {
    paramName: "jambfile", // The name that will be used to transfer the file
    maxFilesize: 0.2, // MB
    maxFiles: 1,
    autoProcessQueue: false,
     addRemoveLinks: true,
     autoDiscover: false,
    dictRemoveFile: " Trash",
    dictInvalidFileType: "upload only JPG/PNG/JPEG",
    acceptedFiles: '.png,.jpg,.jpeg',
    init: function() {

        var _this = this;

        this.on("maxfilesexceeded", function(file) {
            this.removeAllFiles();
            this.addFile(file);
        });


        var submitButtonj = document.querySelector('#jambbtnup');
            myDropzonej = this;
             submitButtonj.addEventListener("click", function(){
                 myDropzonej.processQueue();
             });

        this.on("success", function(file, response){
              if (this.getQueuedFiles().length == 0 && this.getUploadingFiles().length == 0) 
              {
                var _this = this;
               // _this.removeAllFiles();
              }
              //alert(response);
              console.log(this.getUploadingFiles());
              //location.reload();
            });

    }
}





/********************************************
*               Accepted Files  Slider            *
********************************************/
Dropzone.options.dpAcceptFiles = {
    paramName: "sliderfile", // The name that will be used to transfer the file
    maxFilesize: 2, // MB
    maxFiles: 4,
    maxThumbnailFilesize: 2, // MB
    dictMaxFilesExceeded: "Maximum upload limit reached",
    autoProcessQueue: false,
     addRemoveLinks: true,
    dictRemoveFile: " Trash",
    parallelUploads: 4,
    uploadMultiple: true,
    dictInvalidFileType: "upload only JPG/PNG/JPEG",
    acceptedFiles: '.png,.jpg,.jpeg',
    init: function() {

        var _this = this;

        this.on("maxfilesexceeded", function(file) {
            this.removeAllFiles();
            this.addFile(file);
        });


        var submitButtonsl = document.querySelector('#sliderup');
            myDropzonesl = this;
             submitButtonsl.addEventListener("click", function(){
                 myDropzonesl.processQueue();
             });


       this.on("complete", function(file, response){
              if (this.getQueuedFiles().length == 0 && this.getUploadingFiles().length == 0) 
              {
                var _this = this;
               // _this.removeAllFiles();
              }
              console.log(this.getUploadingFiles());
              //location.reload();
            });

    }

}




Dropzone.options.dpzRemoveThumb = {
    paramName: "galleryfile", // The name that will be used to transfer the file
    maxFilesize: 2, // MB
    maxFiles: 10,
     parallelUploads: 10,
    uploadMultiple: true,
    autoProcessQueue: false,
     addRemoveLinks: true,
    dictRemoveFile: " Trash",
    dictInvalidFileType: "upload only JPG/PNG/JPEG",
    acceptedFiles: '.png,.jpg,.jpeg',
    init: function() {

        var _this = this;

        this.on("maxfilesexceeded", function(file) {
            this.removeAllFiles();
            this.addFile(file);
        });


        var submitButtongy = document.querySelector('#galleryup');
            myDropzonegy = this;
             submitButtongy.addEventListener("click", function(){
                 myDropzonegy.processQueue();
             });


      

        this.on("success", function(file, response){
              if (this.getQueuedFiles().length == 0 && this.getUploadingFiles().length == 0) 
              {
                var _this = this;
               // _this.removeAllFiles();
              }
              //alert(response);
              console.log(this.getUploadingFiles());
              //location.reload();
            });

    }
}
