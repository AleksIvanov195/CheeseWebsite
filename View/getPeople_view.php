<!doctype html>
<html>
    <head>
        <title>People List</title>
    </head>
    <body>
        <table>
            All PEOPLE
            <thead>
                    <tr>
                        <th>Person ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>contactNumber</th>
                        <th>password</th>
                        <th>role</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($results as $person):?>
                        <tr>
                            <td><?= $person->id?></td>
                            <td><?= $person->firstName?></td>
                            <td><?= $person->lastName?></td>
                            <td><?= $person->email?></td>
                            <td><?= $person->address?></td>
                            <td><?= $person->contactNumber?></td>
                            <td><?= $person->password?></td>
                            <td><?= $person->role?></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
         </table>
         <br></br>
         <table>
            All Managers
            <thead>
                    <tr>
                        <th>ManagerID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>contactNumber</th>
                        <th>role</th>
                        <th>deparment</th>
                        <th>StartDate</th>
                        <th>salary</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($results as $person):?>
                        <tr>
                            <td><?= $person->managerId?></td>
                            <td><?= $person->firstName?></td>
                            <td><?= $person->lastName?></td>
                            <td><?= $person->email?></td>
                            <td><?= $person->address?></td>
                            <td><?= $person->contactNumber?></td>
                            <td><?= $person->role?></td>
                            <td><?= $person->department?></td>
                            <td><?= $person->startDate?></td>
                            <td><?= $person->salary?></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
         </table>
         <br></br>
         <table>
            All Customers
            <thead>
                    <tr>
                        <th>CustomerID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>contactNumber</th>
                        <th>role</th>
                        <th>DateRegister</th>

                        
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($resultsCustomer as $person):?>
                        <tr>
                            <td><?= $person->personId?></td>
                            <td><?= $person->firstName?></td>
                            <td><?= $person->lastName?></td>
                            <td><?= $person->email?></td>
                            <td><?= $person->address?></td>
                            <td><?= $person->contactNumber?></td>
                            <td><?= $person->role?></td>
                            <td><?= $person->registeredDate?></td>

                        </tr>
                    <?php endforeach ?>
                </tbody>
         </table>
         <br></br>
         <table>
            All Cheeses
            <thead>
                    <tr>
                        <th>CustomerID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>contactNumber</th>
                        <th>role</th>
                        <th>DateRegister</th>

                        
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($resultsCustomer as $person):?>
                        <tr>
                            <td><?= $person->personId?></td>
                            <td><?= $person->firstName?></td>
                            <td><?= $person->lastName?></td>
                            <td><?= $person->email?></td>
                            <td><?= $person->address?></td>
                            <td><?= $person->contactNumber?></td>
                            <td><?= $person->role?></td>
                            <td><?= $person->registeredDate?></td>

                        </tr>
                    <?php endforeach ?>
                </tbody>
         </table>

     </body> 
     </html>