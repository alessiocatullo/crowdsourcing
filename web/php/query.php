<?php
    include("connection.php");

    if(isset($_POST['Method'])){
        $method = $_POST['Method'];
        $method();
    }


	function query_campaign($requester)
	{
        global $con; 
		$sql_campaign = "SELECT * FROM campaign WHERE user = '$requester'";
    	$result_campaign = @mysqli_query($con, $sql_campaign) or die("Errore query campaign");
    	while($row=mysqli_fetch_array($result_campaign)){
            echo "<tr>"."<td>".$row['name']."</td>"."<td class='tabletxt-center'>".$row['dt_start']."</td>"."<td class='tabletxt-center'>".$row['dt_end'].
                "</td>"."<td class='tabletxt-center'>".$row['dt_accession_start']."</td>"."<td class='tabletxt-center'>"
                .$row['dt_accession_end']."</td>"."<td class='tabletxt-center'>"."<a class='tabletxt-center' href='#details' onclick="."details('".$row['name']."',".$row['id'].")".
                "><i class='fas fa-eye'></i></a>"."</td>"."</tr>";
        }
    	@mysqli_free_result($result_campaign);
    	return $result_campaign;
	}

    function query_details()
    {
        global $con;
        $idCampaign = $_POST['id'];

        $sql_task = "SELECT * FROM task WHERE campaign = '$idCampaign'";
        $result_task = @mysqli_query($con, $sql_task) or die("Errore query task-details");
        while($row=mysqli_fetch_array($result_task)){
            echo "<tr>"."<td>".$row['title']."</td>"."<td>".$row['description']."</td>"."<td class='tabletxt-center'>"
                .$row['worker_max']."</td>"."<td class='tabletxt-center'>".$row['majority']."</td>"
                ."<td class='tabletxt-center'>".$row['reward']."</td>"."<td class='tabletxt-center'>"
                ."<a class='tabletxt-center' href='#answer' onclick="."answer(".$row['id'].")".
                "><i class='fas fa-list-alt fa-fw'></i>"."</td>"."<td class='tabletxt-center'>"
                ."<a class='tabletxt-center' href='#keywords' onclick="."keywords(".$row['id'].")".
                "><i class='fas fa-list-alt fa-fw'></i>"."</td>"."<td style='background: yellow;'>"."</td>"."</tr>";
        }
        @mysqli_free_result($result_task);
        return $result_task;
    }

    function query_skill()
    {
        global $con;
        $sql_category = "SELECT * FROM skill";
        $result_category = @mysqli_query($con, $sql_category) or die("Errore query task-category");
        while($row = mysqli_fetch_array($result_category)){
            echo "<option id=".$row['id'].">".$row['name']."</option>";
        }
        @mysqli_free_result($result_category);
        return $result_category;
    }

    function query_skill_subcategory()
    {
        global $con;
        $category = $_POST['id_category']; 
        $sql_subcategory = "SELECT * FROM skill_subcategory WHERE category = '$category'";
        $result_subcategory = @mysqli_query($con, $sql_subcategory) or die("Errore query task-category");
        while($row = mysqli_fetch_array($result_subcategory)){
           echo "<option id=".$row['id'].">".$row['name']."</option>";
        }
        @mysqli_free_result($result_subcategory);
        return $result_subcategory;
    }

?>