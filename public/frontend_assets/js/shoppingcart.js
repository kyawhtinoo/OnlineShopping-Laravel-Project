$(document).ready(function(){
   
     showdata();
     cartnoti();
  


     $(".addtocartBtn").on('click',function(){
     	// alert("ok");
         
         var id=$(this).data('id');
         var name=$(this).data('name');
         var price=$(this).data('price');
         var codeno=$(this).data('codeno');
         var photo=$(this).data('photo');
         var discount=$(this).data('discount');



     var item={
     	id:id,
     	name:name,
     	price:price,
     	codeno:codeno,
     	photo:photo,
     	qty:1,
     	discount:discount,
     };
   console.log(item);
     var jsondata=localStorage.getItem("itemlist");
     var jsonarray;
     if (!jsondata) {
     	jsonarray=[];
     } else{
     	jsonarray=JSON.parse(jsondata);
     }

     var condition=false;


    jsonarray.forEach(function(v,i){
    	if (id==v.id) {
    		v.qty++;
    		condition=true;
    	}



    });

        if (!condition) {
           jsonarray.push(item);
        }

         var jsonstring=JSON.stringify(jsonarray);
         localStorage.setItem("itemlist",jsonstring);
         showdata();

   

     });


     function showdata(){
     	var jsondata=localStorage.getItem("itemlist");
     
      if (jsondata) {
     		var jsonarray=JSON.parse(jsondata);
     		 var html='';
     		  var subtotal=0;

          jsonarray.forEach(function(v,i){
          var id = v.id;
          var name = v.name;
          var price = v.price;
          var codeno = v.codeno;
          var photo = v.photo;          
          var qty = v.qty;          
          var discount = v.discount;
          var total=0;
          if (discount>0) {
            total+=discount*qty;

          }else{
            total+=price*qty;
          }
          

          subtotal+=total;

              html+=`<tr>
                          
                          <td> 
                              <button class="btn btn-outline-danger remove_btn btn-sm" data-id="${i}" style="border-radius: 50%"> 
                                <i class="icofont-close-line"></i>
                              </button>
                          </td>


                         <td><img src="${photo}" width="100"  height="100"</td>
                         <td>
                             ${name}<br>
                             ${codeno}
                         </td>
                         <td>
                             <button class="btn  btn-outline-secondary btnincrease" data-id="${i}">
                                <i class="icofont-plus"></i> 
                             </button>
                         </td>
                         <td>
                            ${qty}
                         </td>
                         <td>
                               <button class="btn btn-outline-secondary btndecrease" data-id="${i}">
                                  <i class="icofont-minus"></i>
                               </button>
                         </td>
                         <td>`;if (discount>0) {
                                 
                              html+=` ${discount}<br>
                             <del>${price}</del>`;
                                  }else{
                              html+=`${price}`
                                   }
                            
                              html+=`</td>
                         <td>
                             ${total}
                         </td>
                          
                    </tr>`



     		});
        $("#shoppingcart_table").html(html);
        cartnoti();
     	  $(".Total_amount").html(subtotal);
      }
     
    }


 

  $('#shoppingcart_table').on('click','.remove_btn', function()
  {
    var id = $(this).data('id');

    // console.log(id);

     var jsondata=localStorage.getItem("itemlist");
   
     var jsonarray=JSON.parse(jsondata);
    $.each(jsonarray,function (i,v) 
    {
      if (i == id) 
      {
        jsonarray.splice(id,1);
      }
    })

    var jsondata=JSON.stringify(jsonarray);

    localStorage.setItem("itemlist",jsondata);
    
    showdata();
    cartnoti();

  });

 $("#shoppingcart_table").on('click','.btnincrease',function(){

        var id=$(this).data('id');
        var jsondata=localStorage.getItem("itemlist");
        if (jsondata) {
        	var jsonArray=JSON.parse(jsondata);

        	jsonArray.forEach(function(v,i){
        		if (i==id) {
        			v.qty++;
        		}
        	});
        	var jsonstring=JSON.stringify(jsonArray);
        	localStorage.setItem("itemlist",jsonstring);
        	showdata();
        }



  });



   $("#shoppingcart_table").on('click','.btndecrease',function(){
           var id=$(this).data('id');
           var itemlist=localStorage.getItem("itemlist");
           if (itemlist) {
           	var jsonArray=JSON.parse(itemlist);

           	jsonArray.forEach(function(v,i){
           		
           		  if(i==id){
            
                   v.qty--;
                if(v.qty==0){
                   jsonArray.splice(id, 1);
                    }
                 }
           	  });

             var jsonstring=JSON.stringify(jsonArray);
             localStorage.setItem("itemlist",jsonstring);
             showdata();


           }
   });


          function cartnoti(){
          	var jsondata=localStorage.getItem("itemlist");
          	   if (jsondata) {
          	   	var jsonArray=JSON.parse(jsondata);
          	   	var total=0;
          	   	var cash=0;
          	   	jsonArray.forEach(function(v,i){
          	   		total+=v.qty;
          	   		if(v.discount > 0){
                    cash+=v.discount*v.qty;
                  }else{
                    cash+=v.price*v.qty;
                  }
          	   	});
          	   }

          	   $(".cartNoti").html(total);
          	   $("#cartCash").text(cash);
          }

        
  });