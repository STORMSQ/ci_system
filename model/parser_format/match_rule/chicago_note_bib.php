<?php

  $journal[1]="(.+)\.\s*(\"|“)(.+)\.(\"|”)\s*((.+)+,\s*)?(.+)\s*\d*\s*((\(.+\))|(,\s*no.\s*\d*+\s*\(.+(\w{1,4})\):\s*.+\.))(.+)\.(.+)?(doi|http)?";           //期刊英文1
  $journal[2]="(.+)。(「)(.+)(」)。((.+)+，)?(.+)(.+)((（.+）)|(，.+（.+）：.+。))(.+)。(.+)?(doi|http)?";                                                    //期刊中文1
                                                                 //期刊中文2                                                                                                                   
########################################################    
  $book[1]="(.+)\.((\s*\w+\"*(“|”)*)+\.)((.+:)(.+,)\s*(\w{1,4}))\.";                                                                                          //書本英文
  $book[2]="(.+)\.((\s*\w+\"*(“|”)*)+\.)((.+:)(.+,)\s*(\w{1,4}))\.";                                                                                          //書本中文

########################################################  
  $thesis[1]='(.+)\.\s*("|“)(.+)\.\s*("|”)\s*([(ph)|(Ph)|(Master)].+\.,)\s*(.+,)\s*(\d{4})\.\s*(.+)\.';                                                       //學位論文英文
  $thesis[2]="(.+)。(「)(.+)(」)。[碩|博].+，(\d{4})。.+";                                                                                                             //學位論文中文

#######################################################  
  $net[1]='(.+)\.\s*("|“)(.+)\.("|”)\s*.+(\d{4}).+(accessed).+\s*(http|ftp|https|ftps)';                                                                      //網路資源英文1
  $net[2]='.+\.("|“)(.+)\.("|”)\s*.+(\d{4}).+(accessed).+\s*(http|ftp|https|ftps)';                                                                               //網路資源英文2    
  $net[3]='(.+)，\s*(「)(.+)(」)，.+(\d{4}).+，(檢索).+，\s*(http|ftp|https|ftps)';                                                                           //網路資源中文1
  $net[4]="(「)(.+)(」)，.+(\d{4}).+，(檢索).+，\s*(http|ftp|https|ftps)";                                                                                    //網路資源中文2

#########################################################  
  $newspaper[1]='((.+\s*[A-Z]\.\s*.+)+|(.+))\s*("|“)(.+),("|”)\s*(.+),\s*.+(\d{4}),\s*(accessed).+';                                                          //報紙英文1
  $newspaper[2]="(.+)，(「)(.+)(」)，(.+)，(\d{4}).+";                                                                                                        //報紙中文1
  
######################################################### 
  $conference[1]='((.+\s*[A-Z]\.\s*.+)+|(.+))\.\s*("|“)(.+)\.("|”)\s*\([^(PhD)|(master\'s)].+(\d{4})\)';                                                        //會議英文1
  $conference[2]='((.+\s*[A-Z]\.\s*.+)+|(.+))\.\s*("|“)(.+)\.("|”)\s*paper\s+presented.+(\d{4})\.\s*(accessed).+';                                           //會議英文2
  $conference[3]="(.+)。\s*(「)(.+)(」)，（講演.+(\d{4}).+）";                                                                                               //會議中文1
  $conference[4]="(.+)。(「)(.+)(」)。（論文發表.+：.+(\d{4}).+）。.+";                                                                                      //會議中文2
  
#########################################################

  $tool[1]='((.+\s*[A-Z]\.\s*.+)+|(.+)),\s*.+(s.v.)\s*("|“)(.+),("|”)\s*(accessed).+(\d{4}),.+';
  $tool[2]="(.+)，見詞條(「)(.+)(」)，(檢索於)(\d{4}).+";

        
?>
