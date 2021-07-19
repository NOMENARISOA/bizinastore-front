@extends('visiteur.template')

@section('content-back')

<div class="row justify-content-center" style="padding: 2%;">
    <div class="col-md-8 shadow form-search"  style="background-color: white; padding :2%; border-radius: 20px">
        <h4 style="text-decoration: underline">Historique</h2>
        <div>
            <table id="historique" class="col-12 text-center">
                <thead>
                    <tr>
                        <th>Date et Heure</th>
                        <th>Votre recherche</th>
                        <th>Nombre de résultat</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Row 1 Data 1</td>
                        <td>Row 1 Data 2</td>
                        <td>Row 1 Data 1</td>
                    </tr>
                    <tr>
                        <td>Row 2 Data 1</td>
                        <td>Row 2 Data 2</td>
                        <td>Row 1 Data 1</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    $(document).ready( function () {
        $('#historique').DataTable({
            "bFilter": false,
        });
    });
</script>
@endsection
