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

            if(!$link) {
                die("Could not connect: " . mysqli_connect_error());
            } else {

                echo "Connected Successfully\n";

                $query = "SELECT Title, ClassRoom Room, MeetDay Day, BegTime Start, EndTime End
                            FROM Professor P, Section S, Meeting M
                            WHERE P.SSN = " . $SSN . " AND P.SSN = S.TeacherSSN AND S.CNum = M.CNum AND S.SecNum = M.SecNum";
                
                $result = mysqli_query($link, $query);

                if (mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_assoc($result)) {
                        echo "Title: " . $row["Title"] . " Room: " . $row["Room"] . " Day: " . $row["Day"] . " Start Time: " . $row["Start"] . " End Time: " . $row["End"];
                    }
                } else {
                    echo "No results";
                }
            }
            mysqli_close($link);
        ?>
    </body>
</html>