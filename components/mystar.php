<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
          .checked{    
        color: orange;
    }


    </style>
  

    <title>Document</title>
</head>
<body>
 <div class="mystars" id="star">   
    <span class="fa fa-star " id="1"  ></span>
    <span class="fa fa-star " id="2"></span>
    <span class="fa fa-star " id="3"></span> 
    <span class="fa fa-star" id="4"></span>
    <span class="fa fa-star" id="5" ></span>
</div>
<script>
    const stars = document.querySelectorAll('.fa');
    let newItem,len ,yellowStar;
 
    stars.forEach(eachStar=>{
        eachStar.addEventListener('click',function(){
            newItem=this.id;
         
            // let htmlId=document.getElementById(newItem);
            // htmlId.classList.add('checked')
             len=parseInt(newItem);

             colorme();
            
            
        })
         
    })
   
    colorme=()=>{
        while(len>0){
         yellowStar=document.getElementById(len);
         yellowStar.classList.add('checked')
         len--;

         

    }

    }
   
    

         

         
         
        
       


       
 

    </script>
</body>
</html>