@extends('layout')

@section('contenu')
    <div class="notification">
        <div class="section">
            <h1>Les utilisateurs</h1>
            <table class="table" id="myTable">
                <thead>
                    <tr>
                        <th onclick="sortTable(0)">Nom</th>
                        <th onclick="sortTable(1)">Prénom</th>
                        <th onclick="sortTable(2)">E-mail</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th onclick="sortTable(0)">Nom</th>
                        <th onclick="sortTable(1)">Prénom</th>
                        <th onclick="sortTable(2)">E-mail</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach($utilisateurs as $utilisateur)
                    <tr>
                        
                        <td>{{ $utilisateur -> nomUtilisateur }}</td>
                        <td>{{ $utilisateur -> prenomUtilisateur }}</td>
                        <td><a href="/utilisateur/{{ $utilisateur -> mel }}">{{ $utilisateur -> mel }}</a></td>
                        
                    </tr>
                    @endforeach
                </tbody>
            </table>
        <script>
            function sortTable(n) {
                var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
                table = document.getElementById("myTable");
                switching = true;
                //Set the sorting direction to ascending:
                dir = "asc"; 
                /*Make a loop that will continue until
                no switching has been done:*/
                while (switching) {
                    //start by saying: no switching is done:
                    switching = false;
                    rows = table.rows;
                    /*Loop through all table rows (except the
                    first, which contains table headers):*/
                    for (i = 1; i < (rows.length - 1); i++) {
                        //start by saying there should be no switching:
                        shouldSwitch = false;
                        /*Get the two elements you want to compare,
                        one from current row and one from the next:*/
                        x = rows[i].getElementsByTagName("TD")[n];
                        y = rows[i + 1].getElementsByTagName("TD")[n];
                        /*check if the two rows should switch place,
                        based on the direction, asc or desc:*/
                        if (dir == "asc") {
                            if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                                //if so, mark as a switch and break the loop:
                                shouldSwitch= true;
                                break;
                            }
                        } else if (dir == "desc") {
                            if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
                                //if so, mark as a switch and break the loop:
                                shouldSwitch = true;
                                break;
                            }
                        }
                    }
                    if (shouldSwitch) {
                        /*If a switch has been marked, make the switch
                        and mark that a switch has been done:*/
                        rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                        switching = true;
                        //Each time a switch is done, increase this count by 1:
                        switchcount ++;      
                    } else {
                    /*If no switching has been done AND the direction is "asc",
                    set the direction to "desc" and run the while loop again.*/
                        if (switchcount == 0 && dir == "asc") {
                            dir = "desc";
                            switching = true;
                        }
                    }
                }
            }
        </script>
        </div>
    </div>

@endsection

