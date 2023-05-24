<!DOCTYPE html>
<html>

<head>
    
    <style>
body{
    overflow-x: hidden;

}        
.Div1 {   
    margin: -10px;
    background-color: burlywood;
    display: grid;
    grid-template-columns: auto auto;
    padding-top: 20px;
    padding-bottom: 20px;
    justify-items: left;
    column-gap: 200px;
}
.park_main{
    display: grid;
    grid-template-columns: 70% 30%;

}


.park_slots{
    display: grid;
    grid-template-columns: auto auto auto;
    grid-template-rows: auto auto;

    justify-items: right;
}

.park_area{
    margin: 80px;
    width: 15rem;
    height: 18rem;
    border: rgb(7, 171, 7);
    background-color: rgb(7, 171, 7);
    border-radius: 10%;
    line-height: 15rem;
    display:flex;
    justify-content: center;
    cursor: pointer;

} 

.park_slot_details{
    padding: 100px;
}

.park_logo{
    margin-top: -14px ;
}
.slotangle{
    font-size: 20px;
    font-style: bold;
    cursor: pointer;
}

.header{
            background-color: burlywood;
            font-size: larger;
            font: bold;
            font-family:'Times New Roman', Times, serif;
            display:grid;
            grid-template-columns: auto auto auto auto auto auto auto auto auto;
        
        }

#headcolor{
        font-size: 120%;
        font:bolder;
        font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
      }



    </style>
</head>

<body>


    <div class="Div1">
        <title>Smart Parking System</title>
        <div class="park_logo">
           <img src =logo1.png>  
        </div>
       
        <img
            src=https://lh3.googleusercontent.com/N8LxEaBwVEQ_B31XdQL1_NZ-4QbGK2Jhpvp1i_wJ3HFJASijQtU6BPnGGmSNwF9K_j9lExWOvnT4L96PNH0Vaq4lJM5Qga0_ukTl8g>
       
    </div>
    <div class="header">
        <a></a>
        <a></a>
        <a></a>
        <a id="headcolor" href="home.php" style=" color:#000000;">Home</a>
        <a id="headcolor" href="login.php" style=" color:#000000;">login</a>
        <a id="headcolor" href="exitrecords.php" style="color:#000000;">Exit Records</a>
        <a id="headcolor" href="about.php" style="color:#000000;">About Us</a>
    </div>
    <div class="park_main">
        <div class="park_slots">
            <div class="park_slot">
                <div class="park_area">
                    <div class="slotangle"><h2>Slot 1</h2></div>

                </div>
            </div>
            <div class="park_slot">
                
                <div class="park_area">
                <div class="slotangle">
                    <h2>Slot 2</h2>
                </div>
                </div>
            </div>
           

        </div>

        <div class="park_details">
            <div class="park_slot_details">
                 <h2>Slots Avaliable: <span id="avaliable">2</span> </h2>
                 <h2>Slots Acquired: <span id="acquire">0</span> </h2>
            </div>
    
         </div>


    </div>

    <br>
    <div class="card-body">
        <div class="table-responsive">
        <table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col"></th>
      <th scope="col"></th>
      <th scope="col"></th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
  
  </tbody>
</table>
    </div>
</div>
</body>
<script>
    let park = document.querySelectorAll(".park_area");
    park.forEach((element)=>{
        element.addEventListener("click",function(){
            console.log("clicked");
            const slotAv = document.getElementById("avaliable");
            const slotAc = document.getElementById("acquire");
            let i = Number(slotAv.textContent);
            let j = Number(slotAc.textContent);
            if(element.style.backgroundColor == "red") {
                element.style.backgroundColor = "rgb(7, 171, 7)"; 
                slotAc.textContent = String(j - 1);
                slotAv.textContent = String(i + 1);
            }
            else{
                element.style.backgroundColor = "red";
                slotAc.textContent= String(j + 1);
                slotAv.textContent = String(i - 1);
            }
        })
    })
        
</script>
</html> 