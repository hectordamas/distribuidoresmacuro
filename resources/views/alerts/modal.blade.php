<div class="modalMessage" style="
position:absolute; 
left:0; 
right:0; 
width:100%; 
height:100%; 
background:rgba(0,0,0,0.5); 
display:flex; 
justify-content:center;
align-items:center;
">
  <div class="box-modal"
  style="
  background:white;
  color:black;
  padding:20px;
  ">
  {{session()->get('message')}}
  </div>
</div>