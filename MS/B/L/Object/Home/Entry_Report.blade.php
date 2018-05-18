<?php
$model=new \B\Form\Model ();

$ups=count(\MS\Core\Helper\Comman::filterDuplicateCandidate($model,'Urban Planner (SMMU)'));
$mfss=count(\MS\Core\Helper\Comman::filterDuplicateCandidate($model,'Municipal Finance Specialist (SMMU)'));
$pss=count(\MS\Core\Helper\Comman::filterDuplicateCandidate($model,'PPP Specialist (SMMU)'));

$upc=count(\MS\Core\Helper\Comman::filterDuplicateCandidate($model,'Urban Planner (CMMU)'));
$uiec=count(\MS\Core\Helper\Comman::filterDuplicateCandidate($model,'Urban Infrastructure Expert (CMMU)'));
$mfsc=count(\MS\Core\Helper\Comman::filterDuplicateCandidate($model,'Municipal Finance Specialist (CMMU)'));
$mesc=count(\MS\Core\Helper\Comman::filterDuplicateCandidate($model,'Monitoring and Evaluation Specialist (CMMU)'));

$array=[
'Urban Planner (SMMU)'=>$ups,
'Municipal Finance Specialist (SMMU)'=>$mfss,
'PPP Specialist (SMMU)'=>$pss,

'Urban Planner (CMMU)'=>$upc,
'Urban Infrastructure Expert (CMMU)'=>$uiec,
'Municipal Finance Specialist (CMMU)'=>$mfsc,
'Monitoring and Evaluation Specialist (CMMU)'=>$mesc,

];

//dd($recent);
//end($people)

?>





<div class="panel-footer ms-border"><i class="fa fa-flag-o" aria-hidden="true"></i> Current Online Application Received ( Total :<i class="fa fa-hashtag" aria-hidden="true"></i> <b> {{ $ups + $mfss + $pss + $upc + $uiec + $mfsc + $mesc}}</b> )   </div>

<div class="panel-body ">

@foreach($array as $key=>$value)
    
            <div class="col-lg-4 col-md-6" >
                    <div class="panel panel-info ms-live-btn" ms-live-link="{{action('\B\Recruitment\Controller@post_home',['post'=>$key])}}">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa fa-user-o fa-2x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><h5><i class="fa fa-hashtag" aria-hidden="true"></i> {{$value}} People</h5></div>
                                  
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left"><b>{{$key}}</b></span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>

@endforeach

</div>