/*-----------------------ORIGINAL-------------------------*/
function setWithExpiry(e,t,o)
{
    const n=new Date;
    console.log(n.getTime()),console.log(n.getTime()+o);
    const l={value:t,expiry:n.getTime()+o};
    localStorage.setItem(e,JSON.stringify(l))
}
function getWithExpiry(e)
{
    const t=localStorage.getItem(e);
    if(!t)return null;
    const o=JSON.parse(t);
    return(new Date).getTime()>o.expiry?(localStorage.removeItem(e),null):o.value
}
/*----------------------------------------------------------*/