<!-- <div class="form-group">
            <label>Genre Id</label>
            <input type="readonly" class="form-control" id="genre" name="genre" placeholder="Genre name">
          </div>
          <div class="form-group">
            <label>Genre</label>
            <input type="text" class="form-control" id="genre" name="genre" placeholder="Genre name">
          </div>
          <div class="form-group">
            <label>Discription</label>
            <textarea type="text" class="form-control" id="description" name="description" placeholder="Genre Description"></textarea>
          </div>


          <?php  
//select.php  
if(isset($_POST["id_genre"]))
{
 $output = '';
 $connect = mysqli_connect("localhost", "root", "", "truyentranh");
 $query = "SELECT * FROM genre WHERE id = '".$_POST["id_genre"]."'";
 $result = mysqli_query($connect, $query);
 $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">';
    while($row = mysqli_fetch_array($result))
    {
     $output .= '
     <tr>  
            <td width="30%"><label>Name</label></td>  
            <td width="70%">'.$row["name_genre"].'</td>  
        </tr>
     ';
    }
    $output .= '</table></div>';
    echo $output;
}
?>