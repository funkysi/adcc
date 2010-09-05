insert into GA_OS_yearly (date,WINXP,WINVISTA,WINSERVER2003,WIN2000,WIN98,WINNT,WIN95,Linux,Mac,Unknown,Wii,Iphone) 
select '2008' as date, sum(WINXP) as WINXP,sum(WINVISTA) as WINVISTA ,sum(WINSERVER2003) as WINSERVER2003,
sum(WIN2000) as WIN2000,sum(WIN98) as WIN98,sum(WINNT) as WINNT,sum(WIN95) as WIN95,sum(Linux) as Linux,sum(Mac) as Mac,sum(Unknown) as Unknown,sum(Wii) as Wii,sum(Iphone) as Iphone from GA_OS_daily 
where date like '2008%'