import { DeleteRequestfe } from "../../apis/RFE"


import { useState,useEffect } from 'react';

export default function PendingRFE(params) {

  const [User ,SetUser]=useState(); 

  useEffect(() => {
    const fetchData = async () => {
      try {
        const jsonitem = localStorage.getItem('user');
        const jsonString = JSON.parse(jsonitem);
        SetUser(jsonString);
      } catch (error) {
        console.error('Error fetching user data:', error);
        // Handle error if necessary
      }
    };

    fetchData();
  }, []);
    return <>
      {
       User?params.Data.data.map(item=>{
        return (item.hr_approve=="pending")&&item.user_id==User.id?<div class="task-card ui-sortable-handle">
        <div class="progress">
          <div class="progress-bar bg-warning" role="progressbar" style={{width: '100%'}} aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        <div class="d-flex justify-content-between mb-3">
          <div>
            <p class="text-muted">{item.created_date}</p>
            <h4 class="task-title">{item.request_type}</h4>
            <p class="task-body">{item.description}</p>
          </div>
          <div class="dropdown">
            <button type="button" class="dropdown-toggle" id="portlet-action-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="typcn typcn-arrow-sorted-dow"></i>
            </button>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="portlet-action-dropdown" >
              <a class="dropdown-item" href="#">Edit</a>
              <button class="dropdown-item" onClick={()=>DeleteRequestfe(item.id)}>Delete</button>
            </div>
          </div>
        </div>
        <div class="image-grouped">
          {/* <img src={"https://apisystem.agricapital-eg.com"+item.user.profileimage} alt="profile image"/> */}
        </div>
        {
          item.request_type=="Sick Leave"||item.request_type=="Annual Vacation"?<p class="text-muted mb-0">From  {item.fromdate} To {item.todate}</p>:<></>

        }
                  {
          item.request_type=="Errands"||item.request_type=="ClockIn Excuse"||item.request_type=="ClockOut Excuse"?<p class="text-muted mb-0">From  {item.from_ci} To {item.to_co}</p>:<></>

        }          <div class="d-flex justify-content-between align-items-center mt-2">
          {
            item.hr_approve=="pending"?<div class="badge badge-success badge-sm mb-5">Pending HR Administrator</div>:<div class="badge badge-info badge-sm"></div>
            
            
          }
        </div>
        {/* <br/> */}
      </div>:<></>
      }):<></> 
      }
    </>
}