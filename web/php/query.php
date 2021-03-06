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
                "<td>".
                "<a class='tabletxt-center float-left' data-toggle='modal' 
                data-target='#accept' onclick="."esito('".$row['user']."','accept')".
                "><i class='fas fa-check' style='color: green;'></i>".
                "<a class='tabletxt-center float-right' data-toggle='modal' data-target='#refused' 
                onclick="."esito('".$row['user']."','refused')".">
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
            echo "<tr>".
            "<td class='tabletxt-center'>"."<a style='cursor: pointer;' class='tabletxt-center' data-toggle='modal' data-target='#top10'
            onclick="."getTop10(".$row['id'].")"."><i class='fas fa-star'></i></a>"."</td>".
            "<td>".$row['name']."</td>".
            "<td class='tabletxt-center'>".$row['dt_start']."</td>".
            "<td class='tabletxt-center'>".$row['dt_end']."</td>".
            "<td class='tabletxt-center'>".$row['dt_accession_start']."</td>".
            "<td class='tabletxt-center'>".$row['dt_accession_end']."</td>".
            "<td class='tabletxt-center'>"."<a href='' class='tabletxt-center' data-toggle='modal' data-target='#tasks-campaign' 
                onclick="."details(".$row['id'].")"."><i class='fas fa-eye'></i></a>"."</td>".
            "<td class='tabletxt-center'>"."<a style='cursor: pointer;' class='tabletxt-center' onclick="."deleteCampaign(".$row['id'].")".
                "><i class='fas fa-trash-alt'></i></a>"."</td>".
            "</tr>";
        }
        @mysqli_free_result($result_campaign);
        return $result_campaign;
    }
    //Query che il nome della campagna
    function query_name_details(){
        global $con;
        $idCampaign = $_POST['id'];

        $sql = "SELECT name FROM campaign WHERE id = '$idCampaign'";
        $result = @mysqli_query($con, $sql) or die("Errore query task name");
        $row = mysqli_fetch_array($result);
        echo $row['name'];
        @mysqli_free_result($result);
        return $result;
    }

    //Query che popula la tabella dei task di una campagna nel dettaglio campagna
    function query_details()
    {
        global $con;
        $idCampaign = $_POST['id'];

        $sql_task = "SELECT * FROM task WHERE campaign = '$idCampaign'";
        $result_task = @mysqli_query($con, $sql_task) or die("Errore query task-details");
        while($row=mysqli_fetch_array($result_task)){
            echo "<tr>".
            "<td class='ellipsis' style='width: 30%;'><span>".$row['title']."</span></td>".
            "<td class='ellipsis' style='width: 37.9%;'>".$row['description']."</span></td>".
            "<td class='tabletxt-center' style='width: 5%;'>".$row['worker_max']."</td>".
            "<td class='tabletxt-center' style='width: 10%;'>".$row['majority']."%</td>".
            "<td class='tabletxt-center' style='width: 5%;'>".$row['reward']."</td>".
            "<td class='tabletxt-center' style='width: 5%;'>"."<a class='tabletxt-center task-analytics-button' data-toogle='modal' data-target='#task-analytics' 
                onclick="."populateAnalyticsTask(".$row['id'].")><i class='fas fa-info-circle fa-fw'></i>"."</td>".
            "<td class='tabletxt-center status-task-".$row['state']."' style='width: 5%;'></td>".
                "><i class='fas fa-info-circle fa-fw'></i>"."</td>".
            "</tr>";
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

    //Query per eliminare un task specificato tramite id da chiamata interna php
    function delete_task_wArgument($id){
        global $con;
        $sql = "DELETE FROM task WHERE id = '$id'";
        $result = @mysqli_query($con, $sql) or die("Errore eliminazione task!");
        @mysqli_free_result($result);
        return $result;
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
            $answerArray = explode("; ", $_POST['answer-'.$task_n]);
            $skillArray = explode("; ", $_POST['skill-'.$task_n]);

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
            $iter_n = 0;

            $task_n++;
        }while(isset($_POST["title-".$task_n]));
        
        return;
    }

    function insert_task(){
        global $con;
        $user = $_POST['user'];
        $campaign = $_POST['campaign'];

        parse_str($_POST['formData'], $_POST);

        $title = $_POST['title'];
        $description = $_POST['description'];
        $worker = $_POST['worker'];
        $majority = $_POST['majority'];
        $reward = $_POST['reward'];
        $answerArray = explode("; ", $_POST['answer']);
        $skillArray = explode("; ", $_POST['skill']);

        $sql = "INSERT INTO task (title, description, worker_max, majority, reward, campaign) 
        VALUES ('$title', '$description', '$worker', '$majority', '$reward', '$campaign')";
        $result = @mysqli_query($con, $sql) or die("Errore inserimento task");
        @mysqli_free_result($result);
        //ID TASK
        $id_task = mysqli_insert_id($con) or die ("Errore recupero id task!");

        $iter_n = 0;
        do{
            $answer = $answerArray[$iter_n++];
            $sql = "INSERT INTO answer_options (answer, task) 
            VALUES ('$answer', '$id_task')";
            $result = @mysqli_query($con, $sql) or die("Errore inserimento risposte".delete_task_wArgument($id_task));
            @mysqli_free_result($result);
        }while($answerArray[$iter_n] != null);
        $iter_n = 0;

        do{
            $skill = $skillArray[$iter_n++];

            $sql = "INSERT INTO task_skill (skill, task) 
            VALUES ('$skill', '$id_task')";
            $result = @mysqli_query($con, $sql) or die("Errore inserimento skill".delete_task_wArgument($id_task));
            @mysqli_free_result($sql);
        } while($skillArray[$iter_n] != null);

        $sql = "SELECT check_assignment_task('$campaign','$id_task')";
        $result = @mysqli_query($con, $sql) or die ("Errore scheduling query ->".$sql);
        @mysqli_free_result($sql);
        return;
    }

    function query_answer_details(){
        global $con;
        $task = $_POST['id'];

        $sql = "SELECT answer FROM answer_options WHERE task = '$task'";
        $result = @mysqli_query($con, $sql) or die("Errore query answer task");
        while($row=mysqli_fetch_array($result)){
            echo "<li style='font-size: x-large;'>".$row['answer']."</li>";
        }
        @mysqli_free_result($result);
        return $result;
    }

    function query_skill_task(){
        global $con;
        $task = $_POST['id'];
        $pointer = '.';

        $sql = "SELECT s".$pointer."name , s".$pointer."main_skill FROM skill as s JOIN task_skill as ts ON s".$pointer."id = ts".$pointer."skill WHERE ts".$pointer."task = '$task'";
        $result = @mysqli_query($con, $sql) or die("Errore query skill task");
        while($row=mysqli_fetch_array($result)){
            echo "<a style='color: white; margin-right: 3px;' class='badge ".($row['main_skill'] == 0 ? 'badge-success':'badge-primary')."'>".$row['name']."</a>";
        }
        @mysqli_free_result($result);
        return $result;
    }

    function query_progress_task(){
        global $con;
        $task = $_POST['id'];

        $sql = "SELECT worker_max, answer, nof_answer, proportion_result(worker_max, nof_answer) as percAnswer FROM task_analytics WHERE id = '$task'";
        $result = @mysqli_query($con, $sql) or die("Errore query progress task analytics");
        while($row=mysqli_fetch_array($result)){
            echo 
                $row['answer']."<span class='float-right strong'>".$row['nof_answer']."/".$row['worker_max']."</span>
                <div class='progress'>
                    <div class='progress-bar progress-bar-striped progress-bar-animated' style='width: ".$row['percAnswer']."%;' role='progressbar' aria-valuenow='".$row['nof_answer']."' aria-valuemax='".$row['worker_max']."'></div>
                </div>";
        }
        @mysqli_free_result($result);
        return $result;
    }

    function query_worker_progress(){
        global $con;
        $task = $_POST['id'];

        $sql = "SELECT worker_max, countAnswer_onTask('$task') as nAnswer, proportion_result(worker_max,countAnswer_onTask('$task')) as percAnswer FROM task WHERE id = '$task'";
        $result = @mysqli_query($con, $sql) or die("Errore query worker progress analytics");
        while($row=mysqli_fetch_array($result)){
            echo 
                "Numero di risposte<span class='float-right strong'>".$row['nAnswer']."/".$row['worker_max']."</span>
                 <div class='progress'>
                    <div class='progress-bar progress-bar-striped progress-bar-animated bg-success' style='width: ".$row['percAnswer']."%;' role='progressbar' aria-valuenow='".$row['nAnswer']."' aria-valuemax='".$row['worker_max']."'></div>
                </div>";
        }
        @mysqli_free_result($result);
        return $result;
    }

    function query_state_task(){
        global $con;
        $task = $_POST['id'];    

        $sql = "SELECT state FROM task WHERE id = '$task'";
        $result = @mysqli_query($con, $sql) or die("Errore query state task");
        $row=mysqli_fetch_array($result);
        echo $row['state'];
        @mysqli_free_result($result);
        return $result;    
    }

    function query_esito_task(){
        global $con;
        $task = $_POST['id'];

        $sql = "SELECT majority, task_result('$task') as result FROM task WHERE id = '$task'";
        $result = @mysqli_query($con, $sql) or die("Errore query esito task");
        $row=mysqli_fetch_array($result);

        if($row['result'] == null){
            echo $row['majority']."% non raggiunto!";
        } else {
            echo $row['majority']."% raggiunto! ".$row['result'];
        }
        
        @mysqli_free_result($result);
        return $result;       
    }

    function query_top10(){
        global $con;
        $campaign = $_POST['id'];
        $i = 1;

        $sql = "CALL top10_user('$campaign')";
        $result = @mysqli_query($con, $sql) or die("Errore Call top10 Procedure!");
        @mysqli_free_result($result);

        $sql = "SELECT * FROM my_tmp_top10";
        $result = @mysqli_query($con, $sql) or die("Errore select della temporary!");
        while($row = mysqli_fetch_array($result)){
            echo "<tr>
                <td class='tabletxt-center'>".$i."</td>
                <td class='tabletxt-center'>".$row['my_tot_score']."</td>
                <td>".$row['my_user']."</td>
                </tr>";
            $i++;
        }

        @mysqli_free_result($result);
        return $result;
    }
    /*-------------------------------------------------------------------------------------------------------------
        Worker
    -------------------------------------------------------------------------------------------------------------*/

    //Query che disegna le card della pagina home del worker
    function query_campaign_wrk($user)
    {
        global $con;
        $pointer = '.';

        $sql_campaign_wrk = "SELECT id, name, dt_accession_start, dt_accession_end, cp".$pointer."user, cp".$pointer."notification, cp".$pointer."notification_value AS nv
            FROM campaign as c 
            LEFT JOIN 
                (SELECT campaign, user, notification, notification_value
                FROM campaign_performed 
                WHERE user = '$user') as cp
            ON c".$pointer."id = cp".$pointer."campaign
            WHERE c".$pointer."dt_accession_start < NOW()";

        $result_campaign_wrk = @mysqli_query($con, $sql_campaign_wrk) or die("Errore query campagne -> $sql_campaign_wrk");
        while($row=mysqli_fetch_array($result_campaign_wrk)){
            echo "
            <li class='campains-element col-12 col-md-6 col-lg-3'>
                <div class='card card-campaign ". ($row['user'] != null ? 'subbed':'') ."'' id='".$row['id']."' style='margin-bottom: 2pc;'>
                    <button data-toggle='modal' class='close btn-camp-analytics' style='position: absolute; left: 15px; top: 10px;' 
                    ".($row['user'] != null ? '':'hidden')."><i class='fas fa-info-circle'></i></button>
                    <button class='close notify-bell' style='position: absolute; left: 18px; top: 140px;' 
                    ".($row['notification'] == null ? 'hidden':'')."><i class='fas ".($row['notification'] == 1 ? 'fa-bell':'fa-bell-slash')."'><span class='badge badge-pill badge-light n_notify' 
                    style='font-size: xx-small; position: absolute; left: 9px; bottom: 12px;'>".($row['nv'] > 0 ? $row['nv'] : '')."</span></i></button>
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
                            <button data-toggle='modal' data-target='".($row['user'] != null ? '#task_response':'#sub')."' class='btn 
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

    function delete_task_assigned_wArgument($id, $user){
        global $con;

        $sql = "DELETE FROM task_performed WHERE task = '$id' AND user = '$user'";
        $result = @mysqli_query($con, $sql) 
            or die("Errore query delete task assigned");
        return $result;
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
    function query_campaign_wrk_select(){
        global $con;
        $pointer = '.';
        $user = $_POST['user'];
        
        $sql_campaign = "SELECT id, name FROM campaign JOIN (SELECT campaign FROM campaign_performed WHERE user = '$user') AS cp WHERE id = cp".$pointer."campaign";
        $result_campaign = @mysqli_query($con, $sql_campaign) or die("Errore query campaign");
        while($row=mysqli_fetch_array($result_campaign)){
            echo "<option value='".$row['id']."'>".$row['name']."</option>";
        }
        @mysqli_free_result($result_campaign);
        return $result_campaign;
    }

    //Query che scrivere i record dei task posseduti dallo user
    function query_task_wrk()
    {
        global $con;
        $pointer = '.';
        $status;
        $user = $_POST['user'];

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
                $row['score'] != null ? $status = $row['score']: $status = 2;
            }else {$status = 3;}

            echo "<tr data-status='".$status."' id='".$row['idc']."-".$row['idt']."'>".
                "<td class='ellipsis' style='width: 14.9%;'><span>".$row['name']."</span></td>".
                "<td class='title-task-record ellipsis' style='width: 25%;'><span>".$row['title']."</span></td>".
                "<td class='desc-task-record ellipsis' style='width: 30%;'><span>".$row['description']."</span></td>".
                "<td class='tabletxt-center' style='width: 16%;'>".$row['reward']."</td>".
                "<td class='tabletxt-center' style='width: 7%;'>"."<a class='tabletxt-center btn-answer ".($status!=3 ? 'disabled' : '')."' href='' data-toggle='modal'>
                    <i class='fas fa-pen'></i></a>"."</td>".
                "<td class='status-answer-".$status." status-opacity' style='width: 7%;'>".$status."</td>"."</tr>";
        }
        @mysqli_free_result($result_campaign);
        return $result_campaign;
    }

    //Qui compila il form della domanda
    function query_task_answer(){
        global $con;
        $idTask = $_POST['idTask'];

        $sql = "SELECT id, answer FROM answer_options WHERE task = '$idTask'";
        $result = @mysqli_query($con, $sql) or die("Errore query task answer");
        while($row=mysqli_fetch_array($result)){
            echo "
            <div class='funkyradio-default'>
                <input type='radio' name='answer-opt' id='".$row['id']."' value='".$row['id']."'/>
                <label for='".$row['id']."'>".$row['answer']."</label>
            </div>";
        }
        @mysqli_free_result($result);
        return $result;
    }

    //Qui avviene il submit della risposta
    function query_answer_submit(){
        global $con;

        $idTask = $_POST['idTask'];
        $user = $_POST['user'];
        parse_str($_POST['formData'], $_POST);
        $answer = $_POST['answer-opt'];

        $sql = "UPDATE task_performed SET answer = '$answer' WHERE task = '$idTask' AND user = '$user'";
        $result = @mysqli_query($con, $sql) or die("Il numero di worker necessari è stato raggiunto! Il task è stato eliminato.".delete_task_assigned_wArgument($idTask,  $user));
        
        $sql = "CALL calculating_score('$idTask')";
        $result = @mysqli_query($con, $sql) or die("La procedure calculating_score ha avuto un problema");
        @mysqli_free_result($result);
        return $result;
    }

    //Query matching task
    function query_task_assignment(){
        global $con;
        $user = $_POST['user'];
        $campaign = $_POST['campaign'];

        $sql = "SELECT task_assignment('$user','$campaign') as id";
        $result = @mysqli_query($con, $sql) or die("Errore query matching task");
        $row = mysqli_fetch_array($result);
        @mysqli_free_result($result);

        $id = $row['id'];
        if($id == null){
            $sql = "SELECT notification FROM campaign_performed WHERE user = '$user' AND campaign = '$campaign'";
            $result = @mysqli_query($con, $sql) or die("Errore query notification");
            $row = mysqli_fetch_array($result);
            if ($row['notification'] == null){
                echo 'null';
            } else {
                echo $row['notification'];
            }
            @mysqli_free_result($result);
            return $result;
        }
        $sql = "INSERT INTO task_performed(task,user) VALUES ('$id','$user')";
        $result = @mysqli_query($con, $sql) or die("Errore insert nuovo task in task_performed");
        return $result;
    }

    //Query skill
    function query_skill_wrk(){
        global $con;
        $user = $_POST['user'];
        $pointer = '.';

        $sql = "SELECT main_skill, name FROM user_skills as usk JOIN skill as s ON usk".$pointer."skill = s".$pointer."id WHERE user = '$user';";
        $result = @mysqli_query($con, $sql) or die("Errore query skills worker");
        while($row=mysqli_fetch_array($result)){
            echo "<a style='color: white; margin-right: 3px;' class='badge ".($row['main_skill'] == 0 ? 'badge-success':'badge-primary')."'>".$row['name']."</a>";
        }
        @mysqli_free_result($result);
        return $result;
    }

    //Query skill ul
    function query_skill_ul_wrk(){
        global $con;
        $user = $_POST['user'];
        $pointer = '.';

        $sql = "SELECT name , skill FROM user_skills as usk JOIN skill as s ON usk".$pointer."skill = s".$pointer."id WHERE user = '$user';";
        $result = @mysqli_query($con, $sql) or die("Errore query skills worker");
        while($row=mysqli_fetch_array($result)){
            echo "<li class='li-answer' id=".$row['skill'].">".$row['name']."<span class='close-answer'><i class='fas fa-times'></i></span></li>";
        }
        @mysqli_free_result($result);
        return $result;
    }

    //Query skill input populate
    function query_skill_input_populate(){
        global $con;
        $user = $_POST['user'];
        $pointer = '.';

        $sql = "SELECT skill FROM user_skills WHERE user = '$user'";
        $result = @mysqli_query($con, $sql) or die("Errore query skills worker");
        while($row=mysqli_fetch_array($result)){
            echo $row['skill']."; ";
        }
        @mysqli_free_result($result);
        return $result;
    }

    //Query cambia passw
    function query_change_passw(){
        global $con;
        $user = $_POST['user'];
        $role = $_POST['role'];
        parse_str($_POST['formData'], $_POST);
        $passw = $_POST['password'];
        $new_pass = $_POST['password-new'];
        $conf_new_pass = $_POST['password-new-confirm'];

        $sql = "SELECT COUNT(*) AS user FROM user  WHERE user = '$user' AND role = '$role' AND password = '$passw'";
        $result = @mysqli_query($con, $sql) or die("Errore query check passw");
        $row=mysqli_fetch_array($result);

        if($row['user'] == 1){
            @mysqli_free_result($result);

            if(strcmp($new_pass, $conf_new_pass) == 0){
                $sql = "UPDATE user SET password = '$new_pass' WHERE user = '$user' AND role = '$role'";
                $result = @mysqli_query($con, $sql) or die("Errore query update password");
                @mysqli_free_result($result);
                return $result;
            }
            echo "Le password non combaciano";
            return $result;
        }
        echo "Password non corretta";
        @mysqli_free_result($result);
        return $result;
    }

    function query_modify_skill(){
        global $con;
        $user = $_POST['user'];
        parse_str($_POST['formData'], $_POST);
        $answerArray = explode("; ", $_POST['skill-input']);
        $i = 0;

        $sql = "DELETE FROM user_skills WHERE user = '$user'";
        $result = @mysqli_query($con, $sql) or die("Errore query remove all skills");
        @mysqli_free_result($result);

        while($answerArray[$i] != null){
            $sql = "INSERT INTO user_skills (user,skill) VALUES ('$user','$answerArray[$i]')";
            $result = @mysqli_query($con, $sql) or die("Errore query insert skill: ".$answerArray[$i]);
            @mysqli_free_result($result);
            $i++;
        }
        return $result;
    }

    function query_check_sub(){
        global $con;
        $user = $_POST['user'];
        $idTask = $_POST['idTask'];
        $pointer = '.';

        $sql = "SELECT COUNT(*) as user_check FROM campaign_performed as cp JOIN (SELECT campaign FROM task WHERE id = '$idTask') as t ON cp".$pointer."campaign = t".$pointer."campaign WHERE user = '$user'";
        $result = @mysqli_query($con, $sql) or die("Errore query remove all skills");
        $row=mysqli_fetch_array($result);

        if($row['user_check'] == 0){
          @mysqli_free_result($result);
          
          echo "Non sei iscritto alla campagna di questo task! Iscriviti e potrai rispondere.";  
        }

        @mysqli_free_result($result);
        return $result;
    }

    function query_position_user(){
        global $con;
        $user = $_POST['user'];
        $campaign = $_POST['campaign'];

        $sql = "SELECT campaign_user_position('$campaign','$user') as pos";
        $result = @mysqli_query($con, $sql) or die("Errore query remove all skills");
        $row=mysqli_fetch_array($result);

        echo $row['pos'];
        @mysqli_free_result($result);
        return $result;
    }

    function query_statistics_user_campaign(){
        global $con;
        $user = $_POST['user'];
        $campaign = $_POST['campaign'];

        $sql = "CALL statistics_ofCampaign('$user', '$campaign', @tot_task, @tot_task_sub, @tot_task_answered, @tot_task_valid)";
        $result = @mysqli_query($con, $sql) or die("Errore Call Procedure - statistics di una campagna!");
        @mysqli_free_result($result);

        $sql = "SELECT @tot_task as tot_task, @tot_task_sub as tot_task_sub, @tot_task_answered as tot_task_answered, @tot_task_valid as tot_task_valid";
        $result = @mysqli_query($con, $sql) or die("Errore Call SELECT della procedure!");
        $row = mysqli_fetch_array($result);

        $tot = $row['tot_task'];
        $tot_sub = $row['tot_task_sub'];
        $tot_ans = $row['tot_task_answered'];
        $tot_cor = $row['tot_task_valid'];

        echo "
            Iscritto<span class='float-right strong'>".$tot_sub."/".$tot."</span>
            <div class='progress'>
                <div class='progress-bar progress-bar-striped progress-bar-animated bg-warning' style='width: ".($tot_sub != 0 ? ($tot_sub*100)/$tot : 0)."%;' 
                role='progressbar' aria-valuenow='".$tot_sub."'  aria-valuemax='".$tot."'></div>
            </div>
            Risposto<span class='float-right strong'>".$tot_ans."/".$tot."</span>
            <div class='progress'>
                <div class='progress-bar progress-bar-striped progress-bar-animated' style='width: ".($tot_ans != 0 ? ($tot_ans*100)/$tot : 0)."%;' 
                role='progressbar' aria-valuenow='".$tot_ans."'  aria-valuemax='".$tot."'></div>
            </div>
            Validi<span class='float-right strong'>".$tot_cor."/".$row['tot_task']."</span>
            <div class='progress'>
                <div class='progress-bar progress-bar-striped progress-bar-animated bg-success' style='width: ".($tot_cor != 0 ? ($tot_cor*100)/$tot : 0)."%;' 
                role='progressbar' aria-valuenow='".$tot_cor."'  aria-valuemax='".$tot."'></div>
            </div>
            ";
        @mysqli_free_result($result);
        return $result;
    }

    function query_notification_accept(){
        global $con;
        $user = $_POST['user'];
        $campaign = $_POST['campaign'];

        $sql = "UPDATE campaign_performed SET notification = 1 WHERE user = '$user' AND campaign = '$campaign'";
        $result = @mysqli_query($con, $sql) or die("Errore Update notification success!");
        @mysqli_free_result($result);
        return $result;
    }

    function query_notification_refuse(){
        global $con;
        $user = $_POST['user'];
        $campaign = $_POST['campaign'];

        $sql = "UPDATE campaign_performed SET notification = 0 WHERE user = '$user' AND campaign = '$campaign'";
        $result = @mysqli_query($con, $sql) or die("Errore Update notification denied!");
        @mysqli_free_result($result);
        return $result;
    }

    function query_remove_notify(){
        global $con;
        $user = $_POST['user'];
        $campaign = $_POST['campaign'];

        $sql = "UPDATE campaign_performed SET notification_value = 0 WHERE user = '$user' AND campaign = '$campaign'";
        $result = @mysqli_query($con, $sql) or die("Errore Update notification value!");
        @mysqli_free_result($result);
        return $result;
    }

    function query_check_skill(){
        global $con;
        $user = $_POST['user'];

        $sql = "SELECT COUNT(*) as n FROM user_skills WHERE user = '$user'";
        $result = @mysqli_query($con, $sql) or die("Errore Count skills worker!");
        $row = mysqli_fetch_array($result);
        echo $row['n'];
        @mysqli_free_result($result);
        return $result;
    }
?>