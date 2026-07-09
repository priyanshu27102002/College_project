import React, { useState, useEffect } from "react";
import axios from "axios";
import Edit_Info from "../components/Edit_Info";
import {
  FiUser,
  FiMail,
  FiPhone,
  FiMapPin,
  FiCalendar,
  FiEdit,
  FiTarget,
  FiGlobe,
  FiBookOpen,
  FiAward,
} from "react-icons/fi";

import { FaLinkedin, FaGithub, FaTwitter } from "react-icons/fa";
axios.defaults.withCredentials = true;
const Profile = () => {
  const [activeTab, setActiveTab] = useState("personal");
  const [openModal, setOpenModal] = useState(false);
  const [userData, setUserData] = useState(null);
  const [loading, setLoading] = useState(true);

  const tabs = [
    { id: "personal", label: "Personal Information" },
    { id: "education", label: "Education" },
    { id: "skills", label: "Skills" },
    { id: "preferences", label: "Preferences" },
  ];

  // Fetch data from Laravel Backend
  const fetchProfileData = async () => {
    try {
      const response = await axios.get("http://localhost:8000/student", {
        headers: {
          'Accept': 'application/json',
          'X-Requested-With': 'XMLHttpRequest' 
        }
      });
      setUserData(response.data);
      setLoading(false);
    } catch (err) {
      console.error("Fetch Error:", err.response?.status);
      setLoading(false);
    }
  };

  

  useEffect(() => {
    fetchProfileData();
  }, [openModal]); // Re-fetch when modal closes (presumably after a save)

  if (loading) {
    return (
      <div className="flex h-screen items-center justify-center bg-gray-100 dark:bg-[#020817]">
        <div className="text-xl font-semibold dark:text-white">Loading Profile...</div>
      </div>
    );
  }

  // Fallback if no data is found in MongoDB
  const profile = userData || {};

  return (
    <div className="p-6 bg-gray-100 dark:bg-[#020817] min-h-screen text-gray-900 dark:text-white transition-all duration-300">
      
      {/* Header */}
      <div className="flex justify-between items-start mb-6">
        <div>
          <h1 className="text-4xl font-bold">My Profile</h1>
          <p className="text-gray-500 dark:text-gray-400 mt-2">
            Manage your academic profile and career preferences
          </p>
        </div>

        <button 
          className="flex items-center gap-2 bg-green-500 hover:bg-green-600 text-white px-5 py-3 rounded-xl shadow-md transition"  
          onClick={() => setOpenModal(true)}
        >
          <FiEdit />
          Edit Profile
        </button>
      </div>

      {/* Top Card */}
      <div className="bg-white dark:bg-gray-900 rounded-2xl shadow-md p-6 mb-8">
        <div className="grid grid-cols-1 lg:grid-cols-3 gap-8 items-center">
          
          <div className="flex items-center gap-6">
            

            <div>
              <h2 className="text-3xl font-bold">
                {profile.personal_info?.first_name || "User"} {profile.personal_info?.last_name || ""}
              </h2>

              <span className="inline-block bg-green-100 text-green-600 px-3 py-1 rounded-full text-sm mt-2 dark:bg-green-900 dark:text-green-300">
                {profile.academic_records?.target_exam || "Student"}
              </span>

              <div className="mt-4 space-y-3 text-gray-600 dark:text-gray-300">
                <p className="flex items-center gap-2">
                  <FiMail />
                  {profile.personal_info?.email || "N/A"}
                </p>
                <p className="flex items-center gap-2">
                  <FiPhone />
                  {profile.personal_info?.phone || "N/A"}
                </p>
                <p className="flex items-center gap-2">
                  <FiMapPin />
                  {profile.location?.city ? `${profile.location.city}, ${profile.location.state}` : "Location not set"}
                </p>
              </div>
            </div>
          </div>

          {/* Stats Section (Keep static or map to other DB fields) */}
          <div className="lg:col-span-2 grid grid-cols-1 sm:grid-cols-3 gap-5">
            <div className="bg-gray-100 dark:bg-gray-800 rounded-xl p-5">
              <div className="w-12 h-12 rounded-full bg-green-100 dark:bg-green-900 flex items-center justify-center text-green-600 mb-4">
                <FiUser size={22} />
              </div>
              <p className="text-gray-500 dark:text-gray-400">Profile Completion</p>
              <h3 className="text-3xl font-bold mt-2">80%</h3>
            </div>
            <div className="bg-gray-100 dark:bg-gray-800 rounded-xl p-5">
              <div className="w-12 h-12 rounded-full bg-blue-100 dark:bg-blue-900 flex items-center justify-center text-blue-600 mb-4">
                <FiAward size={22} />
              </div>
              <p className="text-gray-500 dark:text-gray-400">Certifications</p>
              <h3 className="text-3xl font-bold mt-2">2</h3>
            </div>
            <div className="bg-gray-100 dark:bg-gray-800 rounded-xl p-5">
              <div className="w-12 h-12 rounded-full bg-purple-100 dark:bg-purple-900 flex items-center justify-center text-purple-600 mb-4">
                <FiTarget size={22} />
              </div>
              <p className="text-gray-500 dark:text-gray-400">Career Paths</p>
              <h3 className="text-3xl font-bold mt-2">3</h3>
            </div>
          </div>
        </div>
      </div>

      {/* Tabs */}
      <div className="flex gap-8 border-b border-gray-300 dark:border-gray-700 mb-8 overflow-x-auto">
        {tabs.map((tab) => (
          <button
            key={tab.id}
            onClick={() => setActiveTab(tab.id)}
            className={`pb-4 whitespace-nowrap transition font-medium ${
              activeTab === tab.id
                ? "border-b-2 border-green-500 text-green-500"
                : "text-gray-500 dark:text-gray-400"
            }`}
          >
            {tab.label}
          </button>
        ))}
      </div>

      {/* Main Content */}
      <div className="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <div className="lg:col-span-2 bg-white dark:bg-gray-900 rounded-2xl shadow-md p-6">
          
          {activeTab === "personal" && (
            <>
              <h2 className="text-2xl font-bold mb-6">Personal Information</h2>
              <div className="space-y-6">
                <InfoRow icon={<FiUser />} label="Full Name" value={`${profile.personal_info?.first_name || ""} ${profile.personal_info?.last_name || ""}`} />
                <InfoRow icon={<FiCalendar />} label="Date of Birth" value={profile.personal_info?.dob || "Not set"} />
                <InfoRow icon={<FiMail />} label="Email" value={profile.personal_info?.email || "Not set"} />
                <InfoRow icon={<FiPhone />} label="Phone" value={profile.personal_info?.phone || "Not set"} />
                <InfoRow icon={<FiMapPin />} label="Locality" value={profile.location?.locality || "Not set"} noBorder />
              </div>
            </>
          )}

          {activeTab === "education" && (
            <>
              <h2 className="text-2xl font-bold mb-6">Education Details</h2>
              <div className="space-y-5">
                <div className="bg-gray-100 dark:bg-gray-800 rounded-xl p-5">
                  <h3 className="text-xl font-semibold">Class 12 ({profile.academic_records?.class_12?.board || "N/A"})</h3>
                  <p className="text-gray-600 dark:text-gray-300">{profile.academic_records?.class_12?.school_name || "School not specified"}</p>
                  <p className="text-green-500 mt-3 font-medium">Marks: {profile.academic_records?.class_12?.marks || "0"}%</p>
                </div>
                <div className="bg-gray-100 dark:bg-gray-800 rounded-xl p-5">
                  <h3 className="text-xl font-semibold">Class 10 ({profile.academic_records?.class_10?.board || "N/A"})</h3>
                  <p className="text-gray-600 dark:text-gray-300">{profile.academic_records?.class_10?.school_name || "School not specified"}</p>
                  <p className="text-green-500 mt-3 font-medium">Marks: {profile.academic_records?.class_10?.marks || "0"}%</p>
                </div>
              </div>
            </>
          )}

          {activeTab === "skills" && (
            <>
              <h2 className="text-2xl font-bold mb-6">Skills & Interests</h2>
              <div className="flex flex-wrap gap-4">
                {(profile.skills || ["React", "Laravel", "Tailwind", "MongoDB"]).map((skill, index) => (
                  <span key={index} className="px-5 py-3 rounded-xl bg-green-100 text-green-700 dark:bg-green-900 dark:text-green-300 font-medium">
                    {skill}
                  </span>
                ))}
              </div>
            </>
          )}

          {activeTab === "preferences" && (
            <div className="space-y-5">
               <div className="bg-gray-100 dark:bg-gray-800 rounded-xl p-5">
                  <h3 className="font-semibold text-lg mb-2">Target Examination</h3>
                  <p className="text-gray-600 dark:text-gray-300">{profile.academic_records?.target_exam || "Not specified"}</p>
                </div>
            </div>
          )}
        </div>

        {/* Right Section */}
        <div className="space-y-6">
          <div className="bg-white dark:bg-gray-900 rounded-2xl shadow-md p-6">
            <h2 className="text-2xl font-bold mb-4">About Us</h2>
            <p className="text-gray-600 dark:text-gray-300 leading-7">
              Student at Webel Fujisoft Vara Centre of Excellence. Passionate about Full-Stack development and Cloud Architecture.
            </p>
          </div>

          <div className="bg-white dark:bg-gray-900 rounded-2xl shadow-md p-6">
            <h2 className="text-2xl font-bold mb-6">Social Links</h2>
            <div className="flex gap-4">
              <SocialButton><FaLinkedin size={24} className="text-blue-500" /></SocialButton>
              <SocialButton><FaGithub size={24} /></SocialButton>
              <SocialButton><FaTwitter size={24} className="text-sky-500" /></SocialButton>
              <SocialButton><FiGlobe size={24} /></SocialButton>
            </div>
          </div>
        </div>
      </div>
      
      <Edit_Info openModal={openModal} setOpenModal={setOpenModal}/>
    </div>
  );
};

const InfoRow = ({ icon, label, value, noBorder }) => (
  <div className={`flex justify-between items-center pb-4 ${!noBorder ? "border-b border-gray-200 dark:border-gray-700" : ""}`}>
    <div className="flex items-center gap-3">
      <span className="text-green-500">{icon}</span>
      <span>{label}</span>
    </div>
    <span className="font-medium">{value}</span>
  </div>
);

const SocialButton = ({ children }) => (
  <button className="w-14 h-14 rounded-xl bg-gray-100 dark:bg-gray-800 flex items-center justify-center hover:scale-105 transition">
    {children}
  </button>
);

export default Profile;