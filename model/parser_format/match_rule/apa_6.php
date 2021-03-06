<?php


  $journal[1]="(.+)(\(\d{1,}.*\)|（\d{1,}.*）)(\.)(.+)(\.|!|\?)(.+)(,)([0-9\s]+)(\(.+\)|（.+）)?\s*(,)(.+)(\.)";   //期刊英文1
  $journal[2]="(.+)(\([^0-9].*\)|（[^0-9].*）)(\.)(.+)(\.|!|\?)(.+)(,)([0-9\s]+)(\(.+\)|（.+）)?\s*(,)(.+)(\.)";   //期刊英文2    
  $journal[3]="(.+)(\(\d{1,}.*\)|（\d{1,}.*）)(。)(.+)(。|!|！|\?|？)(.+)(，)([0-9\s]+)(\(.+\)|（.+）)?\s*(，)(.+)(。)"; //期刊中文1  
  $journal[4]="(.+)(\([^0-9].*\)|（[^0-9].*）)(。)(.+)(。|!|！|\?|？)(.+)(，)([0-9\s]+)(\(.+\)|（.+）)?\s*(，)(.+)(。)"; //期刊中文2

########################################################    
     $book[1]="(.+)(\(\d{1,4}\)|（\d{1,}）)(\.)(.+)(\.)(.+[^(^doi:)|(^http:)])(:)([^(^doi:)|(^http:)].+)(\.)";        //書本英文
     $book[2]="(.+)(\(\d{1,4}\)|（\d{1,}）)(。)(.+)(。)(.+[^(^doi:)|(^http:)])(：)([^(^doi:)|(^http:)].+)(。)";       //書本中文

########################################################  
   $thesis[1]="(.+)(\(\d{1,}\)|（\d{1,}）)(\.)(.+)(\(.+\D\)|（.+\D）)(\.)(.+)(\.)";                                 //學位論文英文
   $thesis[2]="(.+)(\(\d{1,}\)|（\d{1,}）)(。)(.+)(\(.+\D\)|（.+\D）)(。)(.+)(。)";                                 //學位論文中文

#######################################################  
      $net[1]="(.+)(\(\d{1,}\)|（\d{1,}）)(\.)(.+)(\.)(.*http:|https:|ftp:|ftps:)(.+)";                                 //網路資源英文1
      $net[2]="(.+)(\(\d{1,}.*\)|（\d{1,}.*）)(\.)(.+)(\.)([^re]|[^Re])(.+http:|ftp:|www:|ftps:)";                      //網路資源英文2
      $net[3]="(.+)(\.)([^re]|[^Re])(.+http:|ftp:|www:|ftps:)";                                                         //網路資源英文3    
      $net[4]="(.+)(\(\d{1,}\)|（\d{1,}）)(。)(.+)(。)(http:|https:|ftp:|ftps:)(.+)";                                   //網路資源中文1
      $net[5]="(.+)(\(\d{1,}.*\)|（\d{1,}.*）)(。)(.+)(。)(.+http:|ftp:|www:|ftps:)";                                   //網路資源中文2
      $net[6]="(.+)(。|，)(.+http:|ftp:|www:|ftps:)";                                                                   //網路資源中文3
#########################################################  
$newspaper[1]="(.+)(\(.+\)|（.+）)(\.)(.+)(\.)(.+)(,)(.+)?";                                                     //報紙英文1
$newspaper[2]="(.+)(\(.+\)|（.+）)(\.)(.+)(,)(.+)?";                                                             //報紙英文2
$newspaper[3]="(.+)(\(.+\)|（.+）)(。)(.+)(。)(.+)(，)(.+)?";                                                    //報紙中文1
$newspaper[4]="(.+)(\(.+\)|（.+）)(。)(.+)(，)(.+)?";                                                            //報紙中文2
  
######################################################### 
$conference[1]="(.+)(\(\d{1,}.*\)|（\d{1,}.*）)(\.)(.+)(\.|\?)(\s*(Poster).+)(\.)(.+)?";                         //會議英文1
$conference[2]="(.+)(\(\d{1,}.*\)|（\d{1,}.*）)(\.)(.+)(\.|\?)(.+\(Chair\))(,)(.+)(\.)(.+)(\.)";                 //會議英文2
$conference[3]="(.+)(\(\d{1,}.*\)|（\d{1,}.*）)(。)(.+)(。|\?|？)(.*(張貼之論文).*)(。)(.+)?";                   //會議中文1
$conference[4]="(.+)(\(\d{1,}.*\)|（\d{1,}.*）)(。)(.+)(。|\?)(.+\(主持\))(，)(.+)(。)(.+)(。)";                 //會議中文2 
$conference[5]="(.+)(\(\d{1,}.*\)|（\d{1,}.*）)(\.)(.+)(\.)(\s*In.+)(\((Ed.|Eds.)\))?(,)(.*[p|P]roceed.+)(\(.+\))(\.)(.+)(:)(.+)(\.)";     //追加：會議英文
$conference[6]="(.+)(\(\d{1,}.*\)|（\d{1,}.*）)(\.)(.+)(\.).+(\(Chair\)){1}.+(\.)(.+)(\.)";                                                   //追加：會議英文
$conference[7]="(.+)(\(\d{1,}.*\)|（\d{1,}.*）)(\.)(.+)(\.)(\s*In.+)(\(.+\))\s*(\(.+\))(\.)(.+)(:)(.+)(\.)";                                  //追加：會議英文
$conference[8]="(.+)(\(\d{1,}.*\)|（\d{1,}.*）)(。)(.+)(，)(.+[研討會|論文集])（.+）(。)(.+)(：|:)(.+)";                                      //追加：會議中文
#########################################################

    $report[1]="(.+)(\(\d{1,}.*\)|（\d{1,}.*）)(\.|\?)(.+)(\(.+(Report|No|NO).+\))(\.|\?)(.+)(:)(.+)(\.)(.+)?";                                    //報告英文1
    $report[2]="(.+)(\(\d{1,}.*\)|（\d{1,}.*）)(。|\?)(.+)((\(.*(國科會|報告|NSC).+\))|（.*(國科會|報告|NSC).+）)(。|\?|？)(.+)(:)(.+)(。)(.+)?";  //報告中文1
  
#########################################################
      $tool[1]="(.+)(\((ed|ED|Ed)\.\))(\.)(\s*\(\d{1,4}\)|（\d{1,}）)(\.)(.+)(\(.+\))(\.)(.+[^(^doi:)|(^http:)])(:)([^(^doi:)|(^http:)].+)(\.)";
      $tool[2]="(.+)(\(\d{1,4}\)|（\d{1,}）)(\.)(.+)(\.)(\s*(In).+)(\(.+\))(\.)(.+[^(^doi:)|(^http:)])(:)([^(^doi:)|(^http:)].+)(\.)";
      $tool[3]="(.+)(\(\d{1,4}\)|（\d{1,}）)(\.)(\s*(In).+)(\(.+\))(\.)(.+[^(^doi:)|(^http:)])(:)([^(^doi:)|(^http:)].+)(\.)";
      $tool[4]="(.+)(\(主編\)|（主編）)(。)(\s*\(\d{1,4}\)|（\d{1,}）)(。)(.+)(\(.+\)|（.+）)(。)(.+[^(^doi:)|(^http:)])(：|:)([^(^doi:)|(^http:)].+)(。)";
      $tool[5]="(.+)(\(主編\)|（主編）)?(\(\d{1,4}\)|（\d{1,}）)(。)(.+)(。)(\s*(在).+)(\(.+\)|（.+）)(。)(.+[^(^doi:)|(^http:)])(:|：)([^(^doi:)|(^http:)].+)(。)";
      $tool[6]="(.+)(\(\d{1,4}\)|（\d{1,}）)(。)(\s*(在).+)(\(.+\)|（.+）)(。)(.+[^(^doi:)|(^http:)])(：)([^(^doi:)|(^http:)].+)(。)";
?>
