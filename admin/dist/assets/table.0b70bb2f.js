import{a}from"./index.3bcaf0cf.js";const e=()=>a({loading:!1,query:{page:1,sort_field:"id",sort_type:"desc"},tableData:[],multipleSelection:[],total:0,currentPage:1,perPage:10}),t=(a,e)=>{e.tableData=a.data.data,e.page=a.data.meta.current_page,e.total=a.data.meta.total,e.currentPage=a.data.meta.current_page,e.perPage=a.data.meta.per_page},r=(a,e)=>{console.log("resetTableSort",a),e.query.page=1,e.query.sort_field=a.prop,e.query.sort_type=a.order};export{r as a,t as r,e as u};