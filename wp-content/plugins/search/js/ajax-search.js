$ = jQuery;


//var ajax_url = "<?php echo admin_url('admin-ajax.php'); ?>";
var proSearch = $("#property-search");/*Form Id*/
var searchForm = proSearch.find("form");

$('.searchs').on('change',function (e){
    
    e.preventDefault();
  
    var data = {
         	action : "property_search", /*Function Name*/
            min_price : $('#min_price').val(),
            maxprice : $('#max_price').val(),
    	    storey :  $('input[name=storey]:checked').val(),
    	    bedroom : $('input[name=bedroom]:checked').val(),
    	    bathroom : $('input[name=bathroom]:checked').val(),
    	   lotsize : $('#lotsize').val(), 
	    
        };
       
        console.log(data);
         $.ajax({
        	url : ajax_url,/*define in functions page*/
        	data : data,
        	type : 'GET',
        /*	beforeSend: function(){
                $('.loader').css("display","block");
           	},*/
        	success : function(response){
        	    console.log(response);
        	     if(response!==0){
        	       
            	    console.log(response);
            	   
            	    var html = '';
            	    for(var i=0; i<response.length; i++){
            			html = html+ 
            			"<li class='col_override'>" 
                    				+ "<div class='house_img_feature'>" 
                    			    + "<a href='" + response[i].permalink + "'>" + "<img class='img-responsive' src='" + response[i].image_url + "'+ 'alt='"+ response[i].title +"'>" + "</a>" 
                    			        + "<div class='house_info'>" 
                    			        + "<div class='title item'>"
                    			            + "<a href='" + response[i].permalink + "'>"+ response[i].title + "</a><span class='more-info'></span>" 
                    			              +"</div>"  
                    			                + "<div class='house_specs'>"
                    			                +"<ul class='floorplan-list'>"
                    			                +"<li class='icon_wrap'><i class='icon icon-bed'></i><span>" + response[i].bedroom+"</span></li>"
                    			                +"<li class='icon_wrap'><i class='icon icon-bath'></i><span>"+response[i].bathroom+"</span></li>"
                    			                +"<li class='icon_wrap'><i class='icon icon-garage'></i><span>"+response[i].storey+"</span></li>"
                    			                +"</ul>"+
                    			                 "</div>"+
                    			                 "<div class='item fixed-price'>Price : <strong>₹" +response[i].price+ "</strong> </div>"+
                    			                 "<div class='item build'>Ready to build from <br>" +response[i].date+ "</div>"+
                    			               "</div>"+
                    			              "<div class='button-group'><a href='" + response[i].permalink + "' class='button secondary'>Learn More</a></div>" +
                    			         "</div>"+
                    			     "</li>";	  
                    			           
                         $("#datasearches").html(html);
                         $('.loader').css("display","none");
            
            		}
        	    }else{
        	        html = '';
        	       // console.log('No results found!');
        	        html= html + "No Result Found!";
        	         $("#datasearches").html(html);
        	         $('#datasearches').css({"text-align":"center","margin-bottom":"30px" ,"font-size":"16px"});
        	         $('.loader').css("display","none");
        	        
        	    }
        	}
         });
        	  
});

$('.price,#price-range-submit').on('click',function (e){
 
    e.preventDefault();
  
    var data = {
         	action : "property_search", /*Function Name*/
            min_price : $('#min_price').val(),
            maxprice : $('#max_price').val(),
            storey :  $('input[name=storey]:checked').val(),
    	    bedroom : $('input[name=bedroom]:checked').val(),
    	    bathroom : $('input[name=bathroom]:checked').val(),
    	   lotsize : $('#lotsize').val(), 
        };
       
        console.log(data);
         $.ajax({
        	url : ajax_url,/*define in functions page*/
        	data : data,
        	type : 'GET',
        	
        	success : function(response){
        	    console.log(response);
        	     if(response!==0){
        	       
            	    console.log(response);
            	   
            	    var html = '';
            	    for(var i=0; i<response.length; i++){
            			html = html+ 
            		"<li class='col_override'>" 
                    				+ "<div class='house_img_feature'>" 
                    			    + "<a href='" + response[i].permalink + "'>" + "<img class='img-responsive' src='" + response[i].image_url + "'+ 'alt='"+ response[i].title +"'>" + "</a>" 
                    			        + "<div class='house_info'>" 
                    			        + "<div class='title item'>"
                    			            + "<a href='" + response[i].permalink + "'>"+ response[i].title + "</a><span class='more-info'></span>" 
                    			              +"</div>"  
                    			                + "<div class='house_specs'>"
                    			                +"<ul class='floorplan-list'>"
                    			                +"<li class='icon_wrap'><i class='icon icon-bed'></i><span>" + response[i].bedroom+"</span></li>"
                    			                +"<li class='icon_wrap'><i class='icon icon-bath'></i><span>"+response[i].bathroom+"</span></li>"
                    			                +"<li class='icon_wrap'><i class='icon icon-garage'></i><span>"+response[i].storey+"</span></li>"
                    			                +"</ul>"+
                    			                 "</div>"+
                    			                 "<div class='item fixed-price'>Price : <strong>₹" +response[i].price+ "</strong> </div>"+
                    			                 "<div class='item build'>Ready to build from <br>" +response[i].date+ "</div>"+
                    			               "</div>"+
                    			              "<div class='button-group'><a href='" + response[i].permalink + "' class='button secondary'>Learn More</a></div>" +
                    			         "</div>"+
                    			     "</li>";	  
                    			           
                         $("#datasearches").html(html);
                         $('.homes-loader').css("display","none");
                         $('.search1').css("display","none");
            
            		}
        	    }else{
        	        html = '';
        	       // console.log('No results found!');
        	        html= html + "No Result Found!";
        	         $("#datasearches").html(html);
        	         $('#datasearches').css({"text-align":"center","margin-bottom":"30px" ,"font-size":"16px"});
        	         $('.homes-loader').css("display","none");
        	         $('.search1').css("display","none");
        	        
        	    }
        	}
         });
        	  
});
                                                                                                                                