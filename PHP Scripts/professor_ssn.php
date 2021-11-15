<!DOCTYPE html>
<html>
    <body>
        <?php
            $host_name = "mariadb";
            $user = "cs332t10";
            $password = "CoolCats332";
            $database = "cs332t10";
            
            $SSN = $_POST['SSN'];


            $link = mysqli_connect($host_name, $user, $password, $database);

            if($link->connect_error) {
                echo "Hello";
                die("Could not connect: " . connect_error());
            } else {
                
                echo "Connected Successfully\n";

                $query = "SELECT Professor.Title Title, Section.ClassRoom Room, Meeting.MeetDay Day, Section.BegTime Start, Section.EndTime End
                            FROM Professor P, Section S, Meeting M
                            WHERE P.SSN = \"$SSN\" AND P.SSN = S.TeacherSSN AND S.CNUM = M.CNUM AND S.SecNum = M.SecNum";
                
                $result = $link->query($query);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "Title: " . $row["Title"] . " Room: " . $row["Room"] . " Day: " . $row["Day"] . " Start Time: " . $row["Start"] . " End Time: " . $row["End"];
                    }
                } else {
                    echo "No results";
                }
            }
            $link->close();
        ?>
    </body>
</html>