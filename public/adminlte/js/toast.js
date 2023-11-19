var myDiv = document.getElementById("toast");
if(myDiv){
  setTimeout(function(){
    toast.style.opacity = 0;
    toast.style.position = "absolute";
  },5000);
}