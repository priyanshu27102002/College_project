import React, { useEffect, useState } from "react";
import { useNavigate } from "react-router-dom";
import axios from "axios";

const Dashboard = () => {
  const navigate = useNavigate();
  const [userData, setUserData] = useState(null);
  axios.defaults.withCredentials = true;
  useEffect(()=>{
    const fetchName = async()=>{
      try{
        const response = await axios.get("http://localhost:8000/student");
        setUserData(response.data);
      }
      catch(err){
        console.error("Dashboard fetch error",err);
      }
    };
    fetchName();
    
  },[]);
  return (
    <div className="p-5">

    {/* Welcome Section */}
    <div className="bg-blue-100 dark:bg-blue-900 p-5 rounded-lg mb-5">
      <h2 className="text-xl font-semibold text-gray-900 dark:text-white">Welcome back, {userData?.personal_info?.first_name || "User"}</h2>
      <p className="text-gray-700 dark:text-gray-300">
        Track your progress and explore your career path
      </p>
  
      <a  href="/test" rel="noopener noreferrer" className="inline-block mt-3 px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
  Take Psychometric Test
</a>
    </div>
  
    {/* Cards */}
    <div className="flex gap-5 mb-5">
      <div className="flex-1 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-200 p-4 rounded-lg shadow text-center">
        <h3 className="font-semibold">Profile Completion</h3>
        <p>70%</p>
      </div>
  
      <div className="flex-1 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-200 p-4 rounded-lg shadow text-center">
        <h3 className="font-semibold">Tests Completed</h3>
        <p>2</p>
      </div>
  
      <div className="flex-1 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-200 p-4 rounded-lg shadow text-center">
        <h3 className="font-semibold">Recommended Careers</h3>
        <p>5</p>
      </div>
    </div>
  
    {/* Recommendation */}
    <div className="bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-200 p-5 rounded-lg shadow">
      <h3 className="font-semibold mb-2">Recommended For You</h3>
      <ul className="list-disc pl-5">
        <li>Software Developer</li>
        <li>Data Analyst</li>
        <li>UI/UX Designer</li>
      </ul>
    </div>
  
  </div>
  );
};


export default Dashboard;

