import{u as i,c as l,a as n,o as r}from"./app-25649675.js";const c={style:{display:"flex","flex-direction":"column",width:"200px"}},u={__name:"Login",setup(m){let s=i();async function t(e){await axios.get("/sanctum/csrf-cookie"),await axios.post("http://localhost:8000/api/login",{email:`${e}@example.com`,password:"12345678"}).then(o=>{s.login(o)}).catch(o=>console.log(o))}return(e,o)=>(r(),l("div",c,[n("button",{onClick:o[0]||(o[0]=a=>t("owner")),style:{"margin-bottom":"10px"}}," Log in as Owner "),n("button",{onClick:o[1]||(o[1]=a=>t("admin"))},"Log in as Admin")]))}};export{u as default};
