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
                "><i class='fas fa-eye'></i></a>"."</td>"."<td class='tabletxt-center'>"."<a class='tabletxt-center' onclick="."deleteCampaign(".$row['id'].")".
                "><i class='fas fa-trash-alt'></i></a>"."</td>"."</tr>";
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

    function query_user_request()
    {
        global $con;
        $sql_user_request = "SELECT * FROM user WHERE status = 0";
        $result_user_request = @mysqli_query($con, $sql_user_request) or die("Errore query user_request");
        while($row = mysqli_fetch_array($result_user_request)){
            echo "<tr>".
                "<td>".$row['user']."</td>".
                "<td class='tabletxt-center'>".$row['first_name']."</td>".
                "<td class='tabletxt-center'>".$row['last_name']."</td>".
                "<td class='tabletxt-center'>".$row['country']."</td>".
                "<td>".
                "<a class='tabletxt-center float-left' data-toggle='modal' 
                data-target='#accept' onclick="."esito('".$row['user']."','accept')".
                "><i class='fas fa-check' style='color: green;'></i>".
                "<a class='tabletxt-center float-right' data-toggle='modal' data-target='#refused'>
                <i class='fas fa-times' style='color: red;'></i>"."</td>".
                "</tr>";
        }
        @mysqli_free_result($result_user_request);
        return $result_user_request;
    }

    function query_accept_user()
    {
        global $con;
        $user = $_POST['user'];

        $sql_user = "UPDATE user SET status = 1 WHERE user = '$user'";
        $result_user = @mysqli_query($con, $sql_user) or die("Errore query update");
        $row = mysqli_fetch_array($result_user);
        return $result_user;
    }

    function query_refuse_user()
    {
        global $con;
        $user = $_POST['user'];

        $sql_user = "DELETE FROM user WHERE user = '$user' AND role = 'REQUESTER'";
        $result_user = @mysqli_query($con, $sql_user) or die("Errore rifiuto user!");
        @mysqli_free_result($result_user);
        return $result_user;
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

    function delete_campaign(){
        global $con;
        $id = $_POST['id'];
        $sql_delete_campaigns = "DELETE FROM campaign WHERE id = '$id'";
        $result_delete_campaigns = @mysqli_query($con, $sql_delete_campaigns) or die("Errore eliminazione campagna!");
        @mysqli_free_result($result_delete_campaigns);
        return $result_delete_campaigns;
    }

    function delete_campaign_wArgument($id){
        global $con;
        $sql_delete_campaigns = "DELETE FROM campaign WHERE id = '$id'";
        $result_delete_campaigns = @mysqli_query($con, $sql_delete_campaigns) or die("Errore eliminazione campagna!");
        @mysqli_free_result($result_delete_campaigns);
        return "Campagna eliminata per precauzione!";
    }

    function insert_campaigns(){
        global $con;
        $task_n = 1;
        $iter_n = 0;
        $user = $_POST['user'];
        parse_str($_POST['formData'], $_POST);
        $name = $_POST['name'];
        $dt_start = $_POST['dt_start'];
        $dt_end = $_POST['dt_end'];
        $dt_accession_start = $_POST['dt_accession_start'];
        $dt_accession_end = $_POST['dt_accession_end'];
        $answerArray = explode("; ", $_POST['answer-'.$task_n]);
        $skillArray = explode("; ", $_POST['skill-'.$task_n]);

        //INSERT CAMAPAGNA
        $sql_insert_campaigns = "INSERT INTO campaign (name, dt_start, dt_end, dt_accession_start, dt_accession_end, user) 
            VALUES ('$name', '$dt_start', '$dt_end', '$dt_accession_start', '$dt_accession_end', '$user')";
        $result_insert_campaigns = @mysqli_query($con, $sql_insert_campaigns) or die("Errore inserimento campagna.");
        @mysqli_free_result($result_insert_campaigns);

        //ID CAMPAGNA
        $id_campaign = mysqli_insert_id($con) or die ("Errore recupero id campagna");

        //INSERT TASK
        do{
            $title = $_POST['title-'.$task_n];
            $description = $_POST['description-'.$task_n];
            $worker = $_POST['worker-'.$task_n];
            $majority = $_POST['majority-'.$task_n];
            $reward = $_POST['reward-'.$task_n];
            $sql_insert_task = "INSERT INTO task (title, description, worker_max, majority, reward, campaign) 
            VALUES ('$title', '$description', '$worker', '$majority', '$reward', '$id_campaign')";
            $sql_insert_task = @mysqli_query($con, $sql_insert_task) or die("Errore inserimento task. ".delete_campaign_wArgument($id_campaign));
            @mysqli_free_result($sql_insert_task);
            //ID TASK
            $id_task = mysqli_insert_id($con) or die ("Errore recupero id task! ".delete_campaign_wArgument($id_campaign));
            //INSERT ANSWER
            do{
                $answer = $answerArray[$iter_n++];
                $sql_insert_answer = "INSERT INTO answer_options (answer, task) 
                VALUES ('$answer', '$id_task')";
                $sql_insert_answer = @mysqli_query($con, $sql_insert_answer) or die("Errore inserimento risposte. ".delete_campaign_wArgument($id_campaign));
                @mysqli_free_result($sql_insert_answer);
            }while($answerArray[$iter_n] != null);
            $iter_n = 0;
            //INSERT SKILL
            do{
                $skill = $skillArray[$iter_n++];
                $sql_search_skill = "SELECT count(id), id FROM skill WHERE name = '$skill'";
                $result = @mysqli_query($con, $sql_search_skill) or die ("Errore ricerca skill. ".delete_campaign_wArgument($id_campaign));
                $row = mysqli_fetch_array($result);

                if($row['id'] != null){ 
                    $id_category = $row['id'];
                    @mysqli_free_result($sql_search_skill);

                    $sql_insert_answer = "INSERT INTO task_skill (task, skill) 
                    VALUES ('$id_task', '$id_category')";
                    $sql_insert_answer = @mysqli_query($con, $sql_insert_answer) or die("Errore inserimento skill categorie. ".delete_campaign_wArgument($id_campaign));
                    @mysqli_free_result($sql_insert_answer);
                } else {
                    @mysqli_free_result($sql_search_skill);
                    $sql_search_skill_subcatogory = "SELECT count(id), id, category FROM skill_subcategory WHERE name = '$skill'";
                    $result = @mysqli_query($con, $sql_search_skill_subcatogory) or die ("Errore ricerca skill nelle sottocategorie. ".delete_campaign_wArgument($id_campaign));
                    $row = mysqli_fetch_array($result);
                    $id_category = $row['category'];
                    $id_subcategory = $row['id'];
                    @mysqli_free_result($sql_search_skill_subcatogory);

                    $sql_insert_answer = "INSERT INTO task_skill (task, skill, skill_subcategory) 
                    VALUES ('$id_task', '$id_category', '$id_subcategory')";
                    $sql_insert_answer = @mysqli_query($con, $sql_insert_answer) or die("Errore inserimento skill sottocategorie. ".delete_campaign_wArgument($id_campaign));
                    @mysqli_free_result($sql_insert_answer);
                }
            }while($skillArray[$iter_n] != null);

            $task_n++;
        }while(isset($_POST["title-".$task_n]));
        
        return;
    }
?>