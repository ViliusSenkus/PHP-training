<!DOCTYPE html>
<html lang="en" />

<head>
      <meta charset="UTF-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <link rel="stylesheet" href="style.css" />
      <title>Multiplication Table</title>
</head>

<body>
      <h1>10 x 10 MULTIPLICATION CHART</h1>

      <main>
            <table>
                  <thead>
                        <tr>
                              <th></th>
                              <?php
                              for ($x = 1; $x <= 10; $x++) {
                                    echo "<th>$x</th>";
                              }
                              ?>
                        </tr>
                  </thead>
                  <tbody>

                        <?php
                        for ($x = 1; $x <= 10; $x++) {
                              for ($y = 0; $y <= 10; $y++) {
                                    if ($y == 0) {
                                          echo "<td class='first'>$x</td>";
                                    } else {
                                          $z = $x * $y;
                                          if ($x == $y) {
                                                echo "<td class='cross'>$z</td>";
                                          } else {
                                                echo "<td>$z</td>";
                                          }
                                    }
                              }
                              echo "</tr>";
                        }
                        ?>

                  </tbody>
            </table>

            <div>
                  <?php
                  $string = "math";
                  for ($l = 0; $l < strlen($string); $l++) {
                        echo '<span>' . strtoupper(substr($string, $l, 1)) . '</span>';
                        if (substr($string, $l, 1) != substr($string, strlen($string) - 1)) {
                              echo '<span> + </span>';
                        }
                  }

                  ?>
                  <span> = </span>
                  <img src="love.jpg" alt="love" />
            </div>
      </main>

</body>

</html>