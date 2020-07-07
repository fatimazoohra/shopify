@extends('layouts.base')

@section('content')

    <!-- Button trigger modal -->

    <!-- Modal -->
    <div class="modal fade bd-example-modal" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-scrollable container-fluid" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalScrollableTitle">Add product</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form>
            <div class="form-group">
                <label for="name" class="col-form-label">Name:</label>
                <input type="text" class="form-control" id="name" >
            </div>
            <div > 
            
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="add_more">
                    <label class="form-check-label" for="defaultCheck1">
                        add details
                    </label>
                    <div class="my_options">
                     </div>  
                    <button  type="button" class="btn btn-outline-info " id="add_another" style="display:none">add another option</button>
                   
                </div>
                
            </div>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save</button>
        </div>
        </div>
    </div>
    </div>

    <div style="margin-top:5%">
        <button  type="button" data-toggle="modal" data-target="#exampleModalScrollable" class="btn btn-outline-info" >add product</button><br></br>
        <table class="table table-striped">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">First</th>
            <th scope="col">Last</th>
            <th scope="col">Handle</th>
            </tr>
        </thead>
        <tbody>
            <tr>
            <th scope="row">1</th>
            <td>Mark</td>
            <td>Otto</td>
            <td>@mdo</td>
            </tr>
            <tr>
            <th scope="row">2</th>
            <td>Jacob</td>
            <td>Thornton</td>
            <td>@fat</td>
            </tr>
            <tr>
            <th scope="row">3</th>
            <td>Larry</td>
            <td>the Bird</td>
            <td>@twitter</td>
            </tr>
        </tbody>
        </table>


        
            


    </div>


    
@endsection
@section('scripts')
<script>
    $(document).ready(function() {
        
        var tab = new Array(1,2,3);
        $('input[type="checkbox"]'). click(function(){
            
            if($(this). prop("checked") == true){
                console.log("Checkbox is checked." );
                
                console.log("checked and i="+tab[0]);
                $("#add_another").show();
                var html = '<div class="row" id="option'+tab[0]+'"><div class="col-11"></div><div class="col-1"><a class="btn_remove" name="remove" id="'+tab[0]+'">remove</a> </div><div class="col-2 form-group">Colors</div><div class="col-10"><input type="text" class="form-control" id="colors" name="colors"></div>';
                tab.shift();
                console.log(tab);
                $('.my_options').append(html);
            }
            else if($(this). prop("checked") == false){
                console.log("Checkbox is unchecked." );
                var length = tab.length+1;
                console.log(length);
                $('.my_options').empty();
                $("#add_another").hide();
                
                tab = new Array(1,2,3);
                console.log("unchecked and i="+tab[0]);
            }
        });

        $(document).on('click','.btn_remove', function(){
                var button_id = $(this).attr("id");
                
                $('#option'+button_id+'').remove();
                
                console.log("removed and i="+tab[0]);
                console.log(tab);
                tab.unshift(button_id);
                console.log(tab);
                if(tab.length<4 && tab.length>0){
                    $("#add_another").show();
                }
                else{
                    $("#add_another").hide();
                    $('#add_more'). prop("checked", false);
                }
        });

        $(document).on('click','#add_another', function(){
            console.log("add another one" );
                
                if(tab[0]==2){
                    var html = '<div class="row" id="option'+tab[0]+'"><div class="col-11"></div><div class="col-1"><a class="btn_remove" name="remove" id="'+tab[0]+'">remove</a> </div><div class="col-2 form-group">sizes</div><div class="col-10"><input type="text" class="form-control" id="sizes" name="sizes" ></div>';
                }
                else if(tab[0]==3){
                    var html = '<div class="row" id="option'+tab[0]+'"><div class="col-11"></div><div class="col-1"><a class="btn_remove" name="remove" id="'+tab[0]+'">remove</a> </div><div class="col-2 form-group">materials</div><div class="col-10"><input type="text" class="form-control" id="materials" name="materials"></div>';
                }
                console.log("added and i="+tab[0]);
                $('.my_options').append(html);
                $("#add_another").show();
                if(tab[0]>2){
                    $("#add_another").hide();
                }
                tab.shift();
        });

        
    });
    
</script>    
@endsection



