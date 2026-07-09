import React from "react";
import Sidebar from "./Sidebar";
import Navbar from "./Navbar";

const Layout = ({ children, darkMode, toggleTheme }) => {
  return (
    <div className="flex">
      
      <Sidebar darkMode={darkMode} />
      <div className="ml-[240px] w-full min-h-screen bg-gray-100 dark:bg-gray-950">
        
        {/* ✅ Pass props here */}
        <Navbar darkMode={darkMode} toggleTheme={toggleTheme} />

        <div className="p-6">
          {children}
        </div>

      </div>
    </div>
  );
};

export default Layout;

const styles = {
  wrapper: {
    display: "flex",
  },
  main: {
    marginLeft: "240px",
    width: "100%",
    minHeight: "100vh",
    background: "#f5f7fa",
  },
  content: {
    padding: "20px",
  },
};