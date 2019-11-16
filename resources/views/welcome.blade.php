<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<body><br>
  <center><h1>Inventory</h1></center>
<!-- Button trigger modal -->
<div id="app">
<div class="container">
<div style="text-align: right;">
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
  Add Item
</button></div><br>
  <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">NAME</th>
      <th scope="col">QUANTITY</th>
      <th scope="col">CATEGORY</th>
      <th scope="col">ACTIONS</th>
    </tr>
  </thead>
  <tbody>
    <tr v-for="inventory in inventories">
      <td>

      </td>
    </tr>
  </tbody>
  </table>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Add Item</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <label>Name:</label>
      <input type="text" class='form-control' v-model='new_item.name' name="name">
      <label>Quantity:</label>
      <input type="number" class='form-control' v-model='new_item.quantity'name="quantity">
      <label>Category:</label>
      <select class='form-control' v-model='new_item.categry' name="categry">
        <option value="Utensil">Utensil</option>
        <option value="Equipment">Equipment</option>
      </select>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" v-on:click="postNewItem" href="">Save changes</button>
      </div>
    </div>
  </div>
</div>
</div>
</div>
</body>
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script>
    var inventories = @json($inventories);
  </script>
<script>
var vm = new Vue({
    el: '#app',
    data: {
      inventories: inventories,
      new_item: {
        id: 1,
        name: '',
        quantity: 1,
        category: '',
      }
    },
    methods: {
      postNewItem(){
        axios.post('/Inventory', this.new_item)
        .then(({data})=>{
              this.inventories.push(data);
              this.new_item.name = '';
              this.new_item.category = '';
              console.log(data);
            });
      }
    }
})
</script>
</html>