<?php
include "classes.php";
include "control.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <link rel="stylesheet" href="style.css" />
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet" />
      <title>Flight sql</title>
</head>
<body>
      <main>
            <h1>Flight data base demo page</h1>

            <h2>Flights information</h2>
            <table>
                  
                  <thead>
                        <tr>
                              <th>#</th>
                              <th>
                                    From
                                    <span class="material-icons-outlined">
                                          north
                                    </span>
                              </th>
                              <th>
                                    To
                                    <span class="material-icons-outlined">
                                          south
                                    </span>
                              </th>
                              <th>Number</th>
                              <th>Date</th>
                              <th>Action</th>
                        </tr>
                  </thead>
                  <tbody>
                        <tr>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td>
                                    <span class="material-icons-outlined edit">
                                          <a href="./?act=f_edit" style="color:rgb(0, 183, 255)">
                                                drive_file_rename_outline
                                          </a>
                                    </span>
                                    <span class="material-icons-outlined del">
                                          <a href="./?act=f_del" style="color:rgb(255, 56, 56)">
                                                delete_forever
                                          </a>
                                    </span>
                              </td>
                        </tr>
                        <tr>
                              <form method="POST">
                                    <td>+</td>
                                    <td>
                                          <input type="text" name="from" />
                                    </td>
                                    <td>
                                          <input type="text" name="to" />
                                    </td>
                                    <td>
                                          <input type="text" name="f_num" />
                                    </td>
                                    <td>
                                          <input type="date" name="f_date" />
                                    </td>
                                    <td>
                                          <input type="text" name="act" value="flt_add" hidden />
                                          <button type="submit" style="background-color: rgb(133, 251, 74)">
                                                <span class="material-icons-outlined add" ">
                                                      add
                                                </span>
                                          </button>
                                    </td>
                              </form>
                        </tr>
                  </tbody>
            </table>
      
            <h2>Passengers information</h2>
            <table>
                  <thead>
                        <tr>
                              <th>#</th>
                              <th>Name</th>
                              <th>Last Name</th>
                              <th>Flight number</th>
                              <th>Action</th>
                        </tr>
                  </thead>
                  <tbody>
                        <tr>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td>
                                    <span class="material-icons-outlined edit">
                                          <a href="./?act=p_edit" style="color:rgb(0, 183, 255)">
                                                drive_file_rename_outline
                                          </a>
                                    </span>
                                    <span class="material-icons-outlined del">
                                          <a href="./?act=p_del" style="color:rgb(255, 56, 56)">
                                                delete_forever
                                          </a>
                                    </span>
                              </td>
                        </tr>
                        <form method="POST">
                              <td>+</td>
                              <td>
                                    <input type="text" name="name" />
                              </td>
                              <td>
                                    <input type="text" name="surname" />
                              </td>
                              <td>
                                    <input type="text" name="f_id" />
                              </td>
                              <td>
                                    <input type="text" name="act" value="psg_add" hidden />
                                    <button type="submit" style="background-color: rgb(133, 251, 74)">
                                          <span class="material-icons-outlined add" ">
                                                add
                                          </span>
                                    </button>
                              </td>
                        </form>
                  </tbody>
            </table>

            <h2>Information search</h2>
            
            <span id="psg">Passenger information</span>
            <span id="flt">Flight information</span>

            <form id="psg_form" method="POST">
                  <label>Name</label>
                  <input type="text" name="name" />
                  <label>Last-name</label>
                  <input type="text" name="name" />
                  <button type="submit">
                        <span class="material-icons-outlined">
                              search
                        </span>
                  </button>
            </form>

            <form id="flt_form" method="POST">
                  <label>Flight number</label>
                  <input type="text" name="f_num" />
                  <button type="submit">
                        <span class="material-icons-outlined">
                              search
                        </span>
                  </button>
            </form>
      </main>
      <script>
            document.querySelector("#psg").addEventListener("click", ()=>{
                  document.querySelector("#psg_form").style.display="block";
                  document.querySelector("#flt_form").style.display="none";
            })
            document.querySelector("#flt").addEventListener("click", ()=>{
                  document.querySelector("#psg_form").style.display="none";
                  document.querySelector("#flt_form").style.display="block";
            })
      </script>
</body>
</html>