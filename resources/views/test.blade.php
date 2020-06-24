<!-- production version, optimized for size and speed -->
<script src="https://cdn.jsdelivr.net/npm/vue"></script>

<div id="app">
    @{{ name }}

                                                    
<ul class="list-group">
 
  <li class="list-group-item" v-for="item in list">@{{item}}
  <button @click="deleteitem(item)" type="button" name="" id="" class="btn btn-primary  ">-</button>
  </li>
 
</ul>

<b4-></b4->

</div>

<script>

    var app = new Vue({
        el: '#app',
        'data': {
            name: 'goarablearn,com',
            list: ['apple' , 'orange' , 'limon'],


        },
        'methods': {
            deleteitem: function(item) {
             this.list.splice(0,1);
                
            }
        }
    });

</script>

<!-- 
getting starting 
data binding & event handing 
conditional & loop 
comonents
forms 
directives
filter & mixins 
animation 
ajax requests vue-resource
routing vue-router & vuex 
unit testing ,, jsmian fram work  -->


    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
 
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
 