import React from "react";
import { NavLink } from "react-router-dom";
import company_logo from "../../assets/images/company_logo.png";
import company_logo_dark from "../../assets/images/company_logo_dark.png";
import { FaBrain } from "react-icons/fa";
import {
  FiHome,
  FiBarChart2,
  FiUser,
  FiBookOpen,
  FiSettings,
  FiHelpCircle
} from "react-icons/fi";
const Sidebar = ({darkMode}) => {
  const menuItems = [
    { name: "Dashboard", path: "/dashboard", icon: <FiHome /> },
    { name: "Psychometric Test", path: "/test", icon: <FaBrain /> },
    { name: "Results", path: "/result", icon: <FiBarChart2 /> },
    { name: "Courses", path: "/courses", icon: <FiBookOpen /> },
    { name: "Profile", path: "/profile", icon: <FiUser /> },

  
  ];

  return (
    <div className="w-[240px] h-screen fixed left-0 top-0 flex flex-col justify-between bg-gray-100 dark:bg-gray-900 text-black dark:text-white shadow-md">
  <div className="py-6 flex flex-col items-center border-b border-gray-300 dark:border-gray-900">
   <img src={darkMode ? company_logo_dark : company_logo} alt="logo" className="w-25 mb-2 transition-all duration-300" />
    </div>
      <ul className="px-3 flex-1">
        {menuItems.map((item, index) => (
          <li key={index}>
            <NavLink
              to={item.path}
              className={({ isActive }) =>
                  `flex items-center gap-3 px-4 py-3 rounded-lg mb-2 transition 
                  ${isActive
                    ? "bg-green-500 text-white"
                    : "text-gray-700 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-800"
                  }`
                }
              
            >
              <span className="text-lg">{item.icon}</span>
              {item.name}
            </NavLink>
          </li>
        ))}
      </ul>
      <div className="border-t border-gray-300 dark:border-gray-700 p-3">
      <NavLink to="/settings" className="flex items-center gap-3 px-4 py-2 rounded-lg mb-2 text-gray-700 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-800"
        >
        <FiSettings />
        Settings
      </NavLink>

      <NavLink to="/help" className="flex items-center gap-3 px-4 py-2 rounded-lg text-gray-700 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-800">
        Help & Support
      </NavLink>
      </div>
    </div>
  );
};

export default Sidebar;

const styles = {
  sidebar: {
    width: "240px",
    height: "100vh",
    background: "#f4f6f9",
    padding: "20px",
    boxShadow: "2px 0 5px rgba(0,0,0,0.1)",
    position: "fixed",
    left: 0,
    top: 0,
  },
  logo: {
    marginBottom: "30px",
    fontSize: "22px",
    fontWeight: "bold",
    textAlign: "center",
  },
  menu: {
    listStyle: "none",
    padding: 0,
  },
  link: {
    display: "flex",
    alignItems: "center",
    padding: "12px 15px",
    textDecoration: "none",
    borderRadius: "8px",
    marginBottom: "10px",
    transition: "0.3s",
    gap: "10px"
  },
  icon: {
    fontSize: "18px",
    display: "flex",
    alignItems: "center",
  },
  footer: {
    marginTop:"auto",
    borderTop: "1px solid #ddd",
    paddingTop: "15px",
  },

  footerLink: {
    display: "block",
    padding: "10px",
    textDecoration: "none",
    color: "#333",
    borderRadius: "6px",
    marginBottom: "5px",
  },
};