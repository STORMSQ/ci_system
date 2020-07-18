<?php

  $journal[1]="/(.+)\.\s*(\"|“)(.+)\.(\"|”)\s*((.+)+,\s*)?(.+)\s*\d*\s*((\(.+\))|(,\s*no.\s*\d*+\s*\(.+(\w{1,4})\):\s*.+\.))(.+)\.(.+)?(doi|http)?/Ux";           //期刊英文1
  $journal[2]="/(.+)。(「)(.+)(」)。((.+)+，)?(.+)(.+)((（.+）)|(，.+（.+）：.+。))(.+)。(.+)?(doi|http)?/Ux";                                           //期刊中文1
                                                                 //期刊中文2                                                                                                                   
########################################################    
  $book[1]="/(.+)\.((\s*\w+\"*(“|”)*)+\.)((.+:)(.+,)\s*(\w{1,4}))\./x";                                                                                 //書本英文
  $book[2]="/(.+)\.((\s*\w+\"*(“|”)*)+\.)((.+:)(.+,)\s*(\w{1,4}))\./x";                                                                             //書本中文

########################################################  
  $thesis[1]='/(.+)\.\s*("|“)(.+)\.\s*("|”)\s*([(ph)|(Ph)|(Master\'s)].+,)\s*(.+,)\s*(\d{4})\s*(,.+)\./Ux';                                                                     //學位論文英文
  $thesis[2]="/(.+)，(「)(.+)(」)（.+(\d{4})）.+/Ux";                                                                                                 //學位論文中文

#######################################################  
  $net[1]='/(.+)\.\s*("|“)(.+),("|”)\s*.+(\d{4}).+(accessed).+,\s*(http|ftp|https|ftps)/Ux';                     //網路資源英文1
  $net[2]='/("|“)(.+),("|”)\s*.+(\d{4}).+(accessed).+,\s*(http|ftp|https|ftps)/Ux';                             //網路資源英文2    
  $net[3]='/(.+)，\s*(「)(.+)(」)，.+(\d{4}).+，(檢索).+，\s*(http|ftp|https|ftps)/Ux';                    //網路資源中文1
  $net[4]="/(「)(.+)(」)，.+(\d{4}).+，(檢索).+，\s*(http|ftp|https|ftps)/Ux";                             //網路資源中文2

#########################################################  
  $newspaper[1]='/((.+\s*[A-Z]\.\s*.+)+|(.+))\s*("|“)(.+),("|”)\s*(.+),\s*.+(\d{4}),\s*(accessed).+/Ux';                              //報紙英文1
  $newspaper[3]="/(.+)，(「)(.+)(」)，(.+)，(\d{4}).+/Ux";                                                     //報紙中文1
  
######################################################### 
  $conference[1]='/((.+\s*[A-Z]\.\s*.+)+|(.+)),\s*("|“)(.+)("|”)\s*\([^(PhD)|(master\'s)].+(\d{4})\)/Ux';                         //會議英文1
  $conference[2]='/((.+\s*[A-Z]\.\s*.+)+|(.+)),\s*("|“)(.+)("|”)\s*\(paper\s+presented.+(\d{4})\),\s*(accessed).+/Ux';            //會議英文2
  $conference[3]="/(.+)，\s*(「)(.+)(」)，（講演.+(\d{4}).+）/Ux";                                    //會議中文1
  $conference[4]="/(.+)，(「)(.+)(」)，（論文發表.+：.+(\d{4}).+），.+/Ux";                           //會議中文2
  
#########################################################

  //$report[1]="//Ux";                            //報告英文1
  //$report[2]="//Ux";
  
#########################################################
  $tool[1]='/((.+\s*[A-Z]\.\s*.+)+|(.+)),\s*.+(s.v.)\s*("|“)(.+),("|”)\s*(accessed).+(\d{4}),.+/Ux';
  $tool[4]="/(.+)，見詞條(「)(.+)(」)，(檢索於)(\d{4}).+/Ux";

        
?>
