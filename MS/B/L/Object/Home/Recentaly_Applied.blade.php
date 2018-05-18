<?php 
$model2=new \B\Form\Model ();


$recent=$model2->get()->unique(function ($item) {
    return $item['Post'].$item['PDEmail'];
})->toArray();



//var_dump(count($model2->get()->toArray()));
//dd(count($recent));
$recent=array_reverse(array_slice($recent,-6,6,true),true);

?>

<div class="panel-footer ms-border"><i class="fa fa-flag-o" aria-hidden="true"></i> Recentaly Applied</div>
<div class="panel-body ">

<table class="table table-bordered table-striped">
<tbody>

<tr>
<th>Photo</th>
<th>Registration No.</th>
<th>Post</th>

<th>Name</th>
<th>Experience</th>


</tr>

@foreach($recent as $value)
<tr class="ms-api-btn" ms-api-link="{{action('\B\Recruitment\Controller@find_form_get',['id'=>$value['UniqId']])}}">
    <?php $img= explode("/", $value['DocPath']);
    $img[]="photo.jpg";
    unset($img[0]);
    $img=implode("/", $img);
    $exp=explode(".",$value['JobExp']);
   // dd($img);
      ?>
<td><center>
<img class="ms-recent-photo" src="{{ asset($img) }}"></center>
</td>

<td>{{ $value['UniqId'] }}</td>
<td>{{ $value['Post'] }}</td>
<td>
{{ $value['NamePrefix'] }} {{ $value['NameFirst'] }} {{ $value['NameFather'] }} {{ $value['NameLast'] }}
</td>

<td>
{{ $exp[0] }} yrs., {{ $exp[1] }} mon.
</td>



</tr>
@endforeach


</tbody>
</table>


</div>