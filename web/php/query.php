<?php
    include("connection.php");

    if(isset($_POST['Method'])){
        $method = $_POST['Method'];
        $method();
    }

    /*-------------------------------------------------------------------------------------------------------------
        ADMIN
    -------------------------------------------------------------------------------------------------------------*/

    //Query che popula la tabella delle richieste REQUESTER della pagina admin
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

    //Query che accetta la richiesta per REQUESTER selezionato
    function query_accept_user()
    {
        global $con;
        $user = $_POST['user'];

        $sql_user = "UPDATE user SET status = 1 WHERE user = '$user'";
        $result_user = @mysqli_query($con, $sql_user) or die("Errore query update");
        $row = mysqli_fetch_array($result_user);
        return $result_user;
    }

    //Query che rifiuta la richiesta per REQUESTER selezionato
    function query_refuse_user()
    {
        global $con;
        $user = $_POST['user'];

        $sql_user = "DELETE FROM user WHERE user = '$user' AND role = 'REQUESTER'";
        $result_user = @mysqli_query($con, $sql_user) or die("Errore rifiuto user!");
        @mysqli_free_result($result_user);
        return $result_user;
    }

    /*-------------------------------------------------------------------------------------------------------------
        REQUESTER
    -------------------------------------------------------------------------------------------------------------*/

    //Query che stampa i record della pagina campaigns
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

    //Query che popula la tabella dei task di una campagna nel dettaglio campagna
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

    //Query che popula il select delle category della creazione nuova campagna
    function query_skill()
    {
        global $con;
        $sql_category = "SELECT * FROM skill WHERE main_skill = 0";
        $result_category = @mysqli_query($con, $sql_category) or die("Errore query task-category");
        while($row = mysqli_fetch_array($result_category)){
            echo "<option id=".$row['id'].">".$row['name']."</option>";
        }
        @mysqli_free_result($result_category);
        return $result_category;
    }

    //Query che popula il select delle subcategory della creazione nuova campagna
    function query_skill_subcategory()
    {
        global $con;
        $category = $_POST['id_category']; 
        $sql_subcategory = "SELECT * FROM skill WHERE main_skill = '$category'";
        $result_subcategory = @mysqli_query($con, $sql_subcategory) or die("Errore query task-category");
        while($row = mysqli_fetch_array($result_subcategory)){
           echo "<option id=".$row['id'].">".$row['name']."</option>";
        }
        @mysqli_free_result($result_subcategory);
        return $result_subcategory;
    }

    //Query per eliminare una campagna specificata tramite id da ajax
    function delete_campaign(){
        global $con;
        $id = $_POST['id'];
        $sql_delete_campaigns = "DELETE FROM campaign WHERE id = '$id'";
        $result_delete_campaigns = @mysqli_query($con, $sql_delete_campaigns) or die("Errore eliminazione campagna!");
        @mysqli_free_result($result_delete_campaigns);
        return $result_delete_campaigns;
    }

    //Query per eliminare una campagna specificata tramite id da chiamata interna php
    function delete_campaign_wArgument($id){
        global $con;
        $sql_delete_campaigns = "DELETE FROM campaign WHERE id = '$id'";
        $result_delete_campaigns = @mysqli_query($con, $sql_delete_campaigns) or die("Errore eliminazione campagna!");
        @mysqli_free_result($result_delete_campaigns);
        return "Campagna eliminata per precauzione!";
    }

    //Query per creare una nuova campagna
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

    /*-------------------------------------------------------------------------------------------------------------
        Worker
    -------------------------------------------------------------------------------------------------------------*/

    //Query che disegna le card della pagina home del worker
    function query_campaign_wrk($user)
    {
        global $con;
        $pointer = '.';

        $sql_campaign_wrk = "SELECT id, name, dt_accession_start, dt_accession_end, cp".$pointer."user 
            FROM campaign as c 
            LEFT JOIN 
                (SELECT campaign, user 
                FROM campaign_performed 
                WHERE user = '$user') as cp
            ON c".$pointer."id = cp".$pointer."campaign";

        $result_campaign_wrk = @mysqli_query($con, $sql_campaign_wrk) or die("Errore query campagne -> $sql_campaign_wrk");
        while($row=mysqli_fetch_array($result_campaign_wrk)){
            echo "
            <li class='campains-element col-12 col-md-6 col-lg-3'>
                <div class='card card-campaign ". ($row['user'] != null ? 'subbed':'') ."'' id='".$row['id']."' style='margin-bottom: 2pc;'>
                    <button data-toggle='modal' data-target='#remove-sub' 
                    class='close btn-sub-remove' style='position: absolute; right: 15px; top: 10px;' 
                    ".($row['user'] != null ? '':'hidden')."><i class='fas fa-times'></i></button>
                    <img class='img-fluid' src='../../ico/". ($row['user'] != null ? 'campaign-sub':'campaign').".png'>
                    <div class='card-body ". ($row['user'] != null ? 'sub':'') ."'>
                        <h4 class='card-title'>".$row['name']."</h4>
                        <h6 class='card-text'>Iscrizioni:</h6>
                        <h7 class='card-text'>Da: ".$row['dt_accession_start']."</h7>
                        <p class='card-text'>A: ".$row['dt_accession_end']."</p>
                    </div>
                    <div class='card-footer'>
                        <div class='d-flex justify-content-center'>
                            <button data-toggle='modal' data-target='".($row['user'] != null ? '#task':'#sub')."' class='btn 
                            btn-sub btn-". ($row['user'] != null ? 'success':'danger')."'>
                            ". ($row['user'] != null ? 'Richiedi Task':'Iscriviti')."</button> 
                        </div>                 
                    </div>
                </div>
            </li>";
        }
        @mysqli_free_result($result_campaign_wrk);
        return $result_campaign_wrk;
    }

    //Query che aggiunge l'iscrizione ad una campagna dello user loggato
    function query_sub_campaign()
    {
        global $con;
        $campaign = $_POST['campaign'];
        $user = $_POST['user'];

        $sql_sub_campaign = "INSERT INTO campaign_performed (campaign, user) VALUES ('$campaign', '$user')";
        $result_sub_campaign = @mysqli_query($con, $sql_sub_campaign) 
            or die("Errore query registrazione alla campagna ->".$campaign." ".$user);
        return $result_sub_campaign;
    }

    //Query che rimuove l'iscrizione ad una campagna dello user loggato
    function query_remove_campaign()
    {
        global $con;
        $campaign = $_POST['campaign'];
        $user = $_POST['user'];

        $sql_remove_campaign = "DELETE FROM campaign_performed WHERE campaign = '$campaign' AND user = '$user'";
        $result_remove_campaign = @mysqli_query($con, $sql_remove_campaign) or die("Errore query elimina iscrizione alla campagna");
        return $result_remove_campaign;
    }

    //Query che popola il select del filtro dei task nella pagina I MIEI TASK del worker
    function query_campaign_wrk_select($user){
        global $con;
        $pointer = '.';

        $sql_campaign = "SELECT id, name FROM campaign JOIN (SELECT campaign FROM campaign_performed WHERE user = '$user') AS cp WHERE id = cp".$pointer."campaign";
        $result_campaign = @mysqli_query($con, $sql_campaign) or die("Errore query campaign");
        while($row=mysqli_fetch_array($result_campaign)){
            echo "<option value='".$row['id']."'>".$row['name']."</option>";
        }
        @mysqli_free_result($result_campaign);
        return $result_campaign;
    }

    //Query che scrivere i record dei task posseduti dallo user
    function query_task_wrk($user)
    {
        global $con;
        $pointer = '.';
        $status;

        $sql_campaign = 
        "SELECT  c".$pointer."id as idc, task_filtered".$pointer."id as idt, c".$pointer."name, task_filtered".$pointer."title, task_filtered".$pointer."description,
        task_filtered".$pointer."answer, task_filtered".$pointer."reward, task_filtered".$pointer."score
        FROM campaign AS c JOIN (
            SELECT  *
            FROM task AS t JOIN (
                SELECT *
                FROM task_performed
                WHERE user = '$user') AS tp
            WHERE
                t".$pointer."id = tp".$pointer."task) AS task_filtered
        WHERE
            c".$pointer."id = task_filtered".$pointer."campaign";


        $result_campaign = @mysqli_query($con, $sql_campaign) or die("Errore query campaign");
        while($row=mysqli_fetch_array($result_campaign)){
            if($row['answer'] != null){
                $row['score'] == 0 ? $status = 1: $status = 2;
            }else {$status = 0;}

            echo "<tr id='".$row['idc']."-".$row['idt']."'>"."<td>".$row['name']."</td>"."<td class='title-task-record'>".$row['title']."</td>"."<td class='desc-task-record'>".$row['description'].
                "</td>"."<td class='tabletxt-center'>".$row['reward']."</td>"."<td class='tabletxt-center'>".
                "<a class='tabletxt-center btn-answer ".($status!=2 ? 'disabled' : '')."' href='' data-toggle='modal' data-target='#answer-form'><i class='fas fa-pen'></i></a>"."</td>".
                "<td class='status-answer-".$status."'>"."</td>"."</tr>";
        }
        @mysqli_free_result($result_campaign);
        return $result_campaign;
    }

    //Qui compila il form della domanda
    function query_task_answer(){
        global $con;
        $idTask = $_POST['idTask'];

        $sql = "SELECT answer FROM answer_options WHERE task = '$idTask'";
        $result = @mysqli_query($con, $sql) or die("Errore query task answer");
        while($row=mysqli_fetch_array($result)){
            echo "<div class='radio'>
                      <label><input type='radio' name='answer-opt' value='".$row['answer']."' required>".$row['answer']."</label>
                  </div>";
        }
        @mysqli_free_result($result);
        return $result;
    }

    function query_answer_submit{
        global $con;

        $idTask = $_POST['idTask'];
        $user = $_POST['user'];
        parse_str($_POST['formData'], $_POST);
        $name = $_POST['name'];

        $sql = "SELECT answer FROM answer_options WHERE task = '$idTask'";
        $result = @mysqli_query($con, $sql) or die("Errore query task answer");
        while($row=mysqli_fetch_array($result)){
            echo "<div class='radio'>
                      <label><input type='radio' name='answer-opt' value='".$row['answer']."' required>".$row['answer']."</label>
                  </div>";
        }
        @mysqli_free_result($result);
        return $result;
    }
?>