<template>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ ('Dashboard') }}</div>

                <div class="card-body">

                    <form id="search">

                     {{ ('Search by name') }}
                     <input class="check__input" v-model="name" @input=name.value type="text">

                     {{ ('Search by bedrooms') }}
                     
                     <input class="check__input" v-model="bedrooms" type="text">

                     {{ ('Search by bathrooms') }}
                     
                     <input class="check__input" v-model="bathrooms" type="text">

                     {{ ('Search by storeys') }}
                     
                     <input class="check__input" v-model="storeys" type="text">

                     {{ ('Search by garages') }}
                     
                     <input class="check__input" v-model="garages" type="text">
                     
                      <button type="submit" class="btn btn-danger" v-on:click="submitForm">
                        {{ ('Find') }} 
                    </button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

<div class="add-table">

</div>
  
</template>

<script>
    export default {
        mounted() {
  
        },
        data() {
            return {
              name: '',
              bedrooms: '',
        	  bathrooms:'',
        	  storeys:'',
        	  garages:'',
            };
        },
        computed:{

        formData(){
          return {
            name:this.name,
            bedrooms:this.bedrooms,
            bathrooms:this.bathrooms,
            storeys:this.storeys,
            garages:this.garages,
          }
        }

      },

        methods: {
            submitForm: function(e) {

                e.preventDefault();
                let currentObj = this;
                headers: {
    			
    			axios.defaults.headers.common['Authorization'] = 'Bearer ${token}'
  				
  				}

                axios.post('http://site/api/getFlatByParam',
                	{ajaxData:this.formData}    
                )
                .then(function (response) {
                		
                	var currentData = response.data;
                    
                    if(currentData.length == 0){

	                $('.jsonTable').remove();

	                if($('.Error').length == 0)
                   		$('.add-table').append('<div class="Error">Apartments not found!</div>');
            
		            }else{
		            		$('.Error').remove();

		            		if($('.jsonTable').length == 0) {

		                    $('.add-table').append('<table class="jsonTable"><thead>'+
		                    						'<th>name</th>'+
             			  							'<th>bedrooms</th>'+
             			  							'<th>bathrooms</th>'+
             			  							'<th>storeys</th>'+
                			  						'<th>garages</th>'+
                			  						'</thead></table>'
                			  						);

            			    }

            			  	$(currentData).each(function(index, resultData) {
	                           $('.jsonTable').append(

		                           '<td>'+resultData.name+'</td>'+
	                               '<td>'+resultData.bedrooms+'</td>'+
	                               '<td>'+resultData.bathrooms+'</td>'+
		                           '<td>'+resultData.storeys+'</td>'+
	                               '<td>'+resultData.garages+'</td>'

	                           );
	                    	});
     
		            } 

                })
                .catch(function (error) {
                    currentObj.output = error;
                });
            }
        }
    }
</script>