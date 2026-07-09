import React from "react";
import { FiBell, FiSun, FiMoon } from "react-icons/fi";

const Navbar = ({ darkMode, toggleTheme }) => {
  return (
    <div className="h-[60px] bg-white dark:bg-gray-900 text-black dark:text-white flex justify-between items-center px-5 border-b sticky top-0 z-50">
      
      {/* Left */}
      <div className="flex items-center">
        <h3 className="font-semibold">Dashboard</h3>
      </div>

      {/* Right */}
      <div className="flex items-center gap-5">
        
        {/* Notification */}
        <span className="text-xl cursor-pointer">
          <FiBell />
        </span>

        {/* Dark Mode Toggle */}
        <button
          onClick={toggleTheme}
          className="text-xl cursor-pointer"
        >
          {darkMode ? <FiSun /> : <FiMoon />}
        </button>

        {/* User */}
        <div className="flex items-center gap-2 cursor-pointer">
          <img
            src="https://i.pravatar.cc/40"
            alt="user"
            className="w-9 h-9 rounded-full"
          />
          <span>Priyanshu</span>
        </div>

      </div>
    </div>
  );
};

export default Navbar;