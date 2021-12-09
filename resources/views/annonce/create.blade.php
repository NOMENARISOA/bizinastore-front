@extends('layouts.template')
@section('content')
    <link rel="stylesheet" href="{{asset('assets/css/dropify.css')}}">
    <script src="{{asset('assets/js/dropify.js')}}"></script>
<style>
    h3{
        font-family: segouil !important;
        font-weight: 900 !important;
        color: #FFBB02
    }
    .inputtext{

        border: none !important;
        border-bottom: 1px solid rgba(0, 0, 0, 0.15) !important;
        font-family: segouil;
        font-weight: 100 !important;
        font-size: 1em !important;
        margin-top: 1%
    }
    label{
        color: #00a1f1;
        font-size: 1em;
        font-family: segouil;
        font-weight: 300;
        text-transform :none;
    }
    .inputselect{
        border-bottom: 1px solid rgba(0, 0, 0, 0.15) !important;
        margin-top: -5%;
        background-color: transparent;
    }
    textarea{
        border-radius: 0.5em;
        border: 1px solid rgba(0, 0, 0, 0.15) !important;
    }
    .dropify-wrapper{
        border : none !important;
        border-radius: 10px;
        height: 150px;
        width: 150px;
        background-color: rgb(150, 148, 148) !important;
        padding: 0px !important;

    }
    .dropify-wrapper .dropify-preview{
        background-color: rgb(150, 148, 148) !important;

        /* padding: 10px !important; */
    }
    .button-valider{

        border: none;
        border-radius: 0.5em !important;
        z-index: 10;
        width: max-content;
        font-family: segouil;
        font-weight: 100;
        font-size: 1em;
        text-transform: none;
        margin-top: -2%;
        color: white !important;
    }
    .button-valider:hover{
        color:white !important;
        background-color: #00a1f1 !important;
    }
</style>
<form action="{{route('annonce.store')}}" enctype="multipart/form-data" method="post">
    @csrf
<div class="row justify-content-center" style="padding-top: 2%;">
    <div class="shadow col-md-7 col-lg-4 form-search"  style="background-color: white; padding :2%; border-radius: 20px">
            <div class="row" >
                <h3 style="margin-bottom: 5%" >Déposer une annonce</h3>
                <div class="col-md-6">
                    <label for="titre">Titre de lannonce (*)</label>
                    <input class="inputtext" type="text" name="titre" id="titre" placeholder="Entre votre titre" required>
                </div>
                <div class="col-md-6">
                    <label for="category">Catégorie (*)</label>
                    <select class="inputselect" name="category" id="category">
                        @foreach ($categories as $category )
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>

            </div>
            <div class="row" id="sub_category" style="margin-top: 2%"></div>
            <div class="row" style="margin-top: 2%">
                <label for="">Ajoutez des photos (*)</label>
                <div class="col-md-3">
                    <div class="form-group">
                        <input type="file" class="dropify required"  data-default-file="{{asset('assets/images/product-single/product-1.jpg')}}" name="image[]" required>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <input type="file" class="dropify required"  data-default-file="{{asset('assets/images/product-single/product-1.jpg')}}" name="image[]" >
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <input type="file" class="dropify required"  data-default-file="{{asset('assets/images/product-single/product-1.jpg')}}" name="image[]" >
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <input type="file" class="dropify required"  data-default-file="{{asset('assets/images/product-single/product-1.jpg')}}" name="image[]" >
                    </div>
                </div>
            </div>
            <div class="row" style="margin-top: 2%">
                <div class="col-md-12">
                    <label for="description">Description (*)</label>
                    <textarea id="description" name="description" style="min-height: 200px" required></textarea>
                </div>
            </div>
            <div class="row" style="margin-top: 2%" >
                <div class="col-md-6">
                    <label for="prix">Prix (*)</label>
                    <input class="inputtext" type="text" name="prix" id="prix" placeholder="Indiquez votre prix" required>
                </div>
                <div class="col-md-6">
                    <label for="mode_paiement">Mode de paiement</label>
                    <select class="inputselect" name="mode_paiement" id="mode_paiement" required>
                        @foreach ($mode_paiements as $mode_paiement )
                            <option value="{{$mode_paiement->id}}">{{$mode_paiement->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row" style="margin-top: 2%" >
                <div class="col-md-6">
                    <label for="region_id">Localisation (Région)</label>
                    <select class="inputselect" name="region_id" id="region_id" required>
                        @foreach ($regions as $region )
                            <option value="{{$region->id}}">{{$region->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="email">Indiquez votre adresse mail (*)</label>
                    <input class="inputtext" type="email" name="email" id="email" placeholder="E-mail" value="{{$annonceur->email}}" required>
                </div>
            </div>
            <div class="row" style="margin-top: 2%;margin-bottom: 5%" >
                <div class="col-md-6">
                    <label for="phone">Indiquez votre numéro de téléphone (*)</label>
                    <input class="inputtext" type="text" name="phone" id="phone" placeholder="Numéro téléphone" value="{{$annonceur->phone}}" required>
                </div>
            </div>
    </div>

</div>
<div class="row justify-content-center" style="margin-bottom:2%">
  <div class="text-center ">
    <button type="submit" class="btn button-valider" style="background-color: #FFBB02">Publier Gratuit</button>
    <button type="submit" class="btn button-valider" formaction="{{ route('annonce.payant') }}" style="background-color: #E70001 ">Publier Annonce Payante </button>
  </div>
</div>

</form>
<script>
    function getSubCategoryAndAppend(){
        var items_id = $('#category').find(':selected').val();
        var $subcategory_div = $('#sub_category');

        $subcategory_div.empty()
        $.ajax({
            type: 'GET',
            url: '{{ url('/') }}/api/subcategory/' + items_id,
            success: function(data) {
                if(data.length > 0){

                    for (var i = 0; i < data.length; i++) {
                        var required = "";
                        var input = "";
                        if(data[i].is_obligatoir==1){
                            required = "required";
                        }
                        if(data[i].list.length > 0){
                            input = '<div class="col-md-6">'
                                +'<label for="'+data[i].name+'">'+data[i].libelle+'</label>'
                                +'<select class="inputselect" name="'+data[i].name+'" id="'+data[i].name+'">';

                            data[i].list.forEach(function(item){
                                input = input + '<option value="'+item.id+'">'+item.value+'</option>'
                            })

                            input = input + '</select>'+'</div>'
                            console.log(input);
                        }else{
                            input = '<div class="col-md-6">'
                                +'<label for="'+data[i].name+'">'+data[i].libelle+'</label>'
                                +'<input class="inputtext" type="text" name="' + data[i].name +'" id="'+data[i].name+'" placeholder="'+data[i].placeholder+'" '+required+'>'
                                +'</div>'

                        }
                        $subcategory_div.append(input);
                    }
                }
            }
        });
    }
</script>
<script>
    $('#category').change(function(){
        getSubCategoryAndAppend();
    })
</script>
<script>
    $(document).ready(function(){
        // Basic
        getSubCategoryAndAppend();
        $('.dropify').dropify();

        // Translated
        $('.dropify-fr').dropify({
            messages: {
                default: 'Glissez-déposez un fichier ici ou cliquez',
                replace: 'Glissez-déposez un fichier ou cliquez pour remplacer',
                remove:  'Supprimer',
                error:   'Désolé, le fichier trop volumineux'
            }
        });

        // Used events
        var drEvent = $('#input-file-events').dropify();

        drEvent.on('dropify.beforeClear', function(event, element){
            return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
        });

        drEvent.on('dropify.afterClear', function(event, element){
            alert('File deleted');
        });

        drEvent.on('dropify.errors', function(event, element){
            console.log('Has Errors');
        });

        var drDestroy = $('#input-file-to-destroy').dropify();
        drDestroy = drDestroy.data('dropify')
        $('#toggleDropify').on('click', function(e){
            e.preventDefault();
            if (drDestroy.isDropified()) {
                drDestroy.destroy();
            } else {
                drDestroy.init();
            }
        })
    });
</script>
@endsection
