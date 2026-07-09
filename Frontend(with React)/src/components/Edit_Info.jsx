import React, { useEffect, useState } from "react";
import { FiX } from "react-icons/fi";
import axios from "axios";
axios.defaults.withCredentials = true;
axios.defaults.withXSRFToken = true;
const API_BASE_URL = "http://localhost:8000/api";

const Edit_Info = ({ openModal, setOpenModal }) => {

  /* ================= STATE ================= */

  const [formData, setFormData] = useState({
    first_name: "",
    last_name: "",
    email: "",
    dob: "",
    gender: "",
    phone: "",

    locality: "",
    village: "",
    city: "",
    state: "",

    target_exam: "",

    class10school: "",
    class10board: "",
    class10marks: "",

    class12school: "",
    class12board: "",
    class12marks: "",
  });

  /* ================= FETCH DATA ================= */

  useEffect(() => {
    if (openModal) {
      const fetchCurrentData = async () => {
        try {
          const response = await axios.get("http://localhost:8000/student");
          const data = response.data;

          // Map the nested MongoDB structure back to your flat form fields
          setFormData({
            first_name: data.personal_info?.first_name || "",
            last_name: data.personal_info?.last_name || "",
            email: data.personal_info?.email || "",
            phone: data.personal_info?.phone || "",
            dob: data.personal_info?.dob || "",
            gender: data.personal_info?.gender || "",
          
            locality: data.location?.locality || "",
            village: data.location?.village || "",
            city: data.location?.city || "",
            state: data.location?.state || "",
          
            class10school:
              data.academic_records?.class_10?.school || "",
          
            class10board:
              data.academic_records?.class_10?.board || "",
          
            class10marks:
              data.academic_records?.class_10?.marks || "",
          
            class12school:
              data.academic_records?.class_12?.school || "",
          
            class12board:
              data.academic_records?.class_12?.board || "",
          
            class12marks:
              data.academic_records?.class_12?.marks || "",
          
            target_exam:
              data.academic_records?.target_exam || "",
          });
        } catch (err) {
          console.error("Error fetching data for edit:", err);
        }
      };
      fetchCurrentData();
    }
  }, [openModal]); // Will refetch every time the modal opens
  /* ================= HANDLE CHANGE ================= */

  const handleChange = (e) => {

    setFormData({
      ...formData,
      [e.target.name]: e.target.value,
    });

  };

  /* ================= UPDATE ================= */

  const handleSubmit = async (e) => {

    e.preventDefault();
  
    try {
  
      await axios.get(
        "http://localhost:8000/sanctum/csrf-cookie"
      );
  
      const response = await axios.post(
        "http://localhost:8000/api/student/update",
        formData
      );
  
      alert(response.data.message);
  
    } catch (error) {
  
      console.log(error);
  
      alert("Update Failed");
    }
  };

  if (!openModal) return null;

  return (

    <div className="fixed inset-0 z-50 bg-black/70 flex justify-center items-center overflow-y-auto p-4">

      <div className="w-full max-w-6xl bg-[#111827] rounded-2xl shadow-2xl border border-gray-700">

        {/* HEADER */}

        <div className="flex items-center justify-between px-8 py-5 border-b border-gray-700">

          <div>
            <h2 className="text-3xl font-bold text-white">
              Edit Student Details
            </h2>

            <p className="text-gray-400 mt-1">
              Update your academic information
            </p>
          </div>

          <button
            onClick={() => setOpenModal(false)}
            className="text-gray-400 hover:text-red-500 text-3xl"
          >
            <FiX />
          </button>

        </div>

        {/* FORM */}

        <div className="p-8">

          <form
            onSubmit={handleSubmit}
            className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6"
          >

            {/* FIRST NAME */}

            <div>
              <label className="block text-gray-300 mb-2">
                First Name
              </label>

              <input
                type="text"
                name="first_name"
                value={formData.first_name}
                onChange={handleChange}
                className="w-full px-4 py-3 rounded-xl bg-[#1F2937] border border-gray-600 text-white outline-none focus:border-green-500"
              />
            </div>

            {/* LAST NAME */}

            <div>
              <label className="block text-gray-300 mb-2">
                Last Name
              </label>

              <input
                type="text"
                name="last_name"
                value={formData.last_name}
                onChange={handleChange}
                className="w-full px-4 py-3 rounded-xl bg-[#1F2937] border border-gray-600 text-white outline-none focus:border-green-500"
              />
            </div>

            {/* EMAIL */}

            <div>
              <label className="block text-gray-300 mb-2">
                Email
              </label>

              <input
                type="email"
                value={formData.email}
                readOnly
                className="w-full px-4 py-3 rounded-xl bg-[#0F172A] border border-gray-700 text-gray-400"
              />
            </div>

            {/* LOCALITY */}

            <div>
              <label className="block text-gray-300 mb-2">
                Locality
              </label>

              <input
                type="text"
                name="locality"
                value={formData.locality}
                onChange={handleChange}
                className="w-full px-4 py-3 rounded-xl bg-[#1F2937] border border-gray-600 text-white outline-none focus:border-green-500"
              />
            </div>

            {/* VILLAGE */}

            <div>
              <label className="block text-gray-300 mb-2">
                Village / Address
              </label>

              <input
                type="text"
                name="village"
                value={formData.village}
                onChange={handleChange}
                className="w-full px-4 py-3 rounded-xl bg-[#1F2937] border border-gray-600 text-white outline-none focus:border-green-500"
              />
            </div>

            {/* CITY */}

            <div>
              <label className="block text-gray-300 mb-2">
                City
              </label>

              <input
                type="text"
                name="city"
                value={formData.city}
                onChange={handleChange}
                className="w-full px-4 py-3 rounded-xl bg-[#1F2937] border border-gray-600 text-white outline-none focus:border-green-500"
              />
            </div>

            {/* STATE */}

            <div>
              <label className="block text-gray-300 mb-2">
                State
              </label>

              <input
                type="text"
                name="state"
                value={formData.state}
                onChange={handleChange}
                className="w-full px-4 py-3 rounded-xl bg-[#1F2937] border border-gray-600 text-white outline-none focus:border-green-500"
              />
            </div>

            {/* DOB */}

            <div>
              <label className="block text-gray-300 mb-2">
                Date Of Birth
              </label>

              <input
                type="date"
                name="dob"
                value={formData.dob}
                onChange={handleChange}
                className="w-full px-4 py-3 rounded-xl bg-[#1F2937] border border-gray-600 text-white outline-none focus:border-green-500"
              />
            </div>

            {/* GENDER */}

            <div>
              <label className="block text-gray-300 mb-2">
                Gender
              </label>

              <select
                name="gender"
                value={formData.gender}
                onChange={handleChange}
                className="w-full px-4 py-3 rounded-xl bg-[#1F2937] border border-gray-600 text-white outline-none focus:border-green-500"
              >
                <option value="">Select Gender</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="other">Other</option>
              </select>
            </div>

            {/* PHONE */}

            <div>
              <label className="block text-gray-300 mb-2">
                Phone
              </label>

              <input
                type="text"
                name="phone"
                value={formData.phone}
                onChange={handleChange}
                className="w-full px-4 py-3 rounded-xl bg-[#1F2937] border border-gray-600 text-white outline-none focus:border-green-500"
              />
            </div>

            {/* TARGET EXAM */}

            <div>
              <label className="block text-gray-300 mb-2">
                Target Exam
              </label>

              <select
                name="target_exam"
                value={formData.target_exam}
                onChange={handleChange}
                className="w-full px-4 py-3 rounded-xl bg-[#1F2937] border border-gray-600 text-white outline-none focus:border-green-500"
              >
                <option value="jee">JEE</option>
                <option value="neet">NEET</option>
                <option value="clat">CLAT</option>
              </select>
            </div>

            {/* CLASS 10 SCHOOL */}

            <div>
              <label className="block text-gray-300 mb-2">
                Class 10 School
              </label>

              <input
                type="text"
                name="class10school"
                value={formData.class10school}
                onChange={handleChange}
                className="w-full px-4 py-3 rounded-xl bg-[#1F2937] border border-gray-600 text-white outline-none focus:border-green-500"
              />
            </div>

            {/* CLASS 10 BOARD */}

            <div>
              <label className="block text-gray-300 mb-2">
                Class 10 Board
              </label>

              <input
                type="text"
                name="class10board"
                value={formData.class10board}
                onChange={handleChange}
                className="w-full px-4 py-3 rounded-xl bg-[#1F2937] border border-gray-600 text-white outline-none focus:border-green-500"
              />
            </div>

            {/* CLASS 10 MARKS */}

            <div>
              <label className="block text-gray-300 mb-2">
                Class 10 Percentage
              </label>

              <input
                type="text"
                name="class10marks"
                value={formData.class10marks}
                onChange={handleChange}
                className="w-full px-4 py-3 rounded-xl bg-[#1F2937] border border-gray-600 text-white outline-none focus:border-green-500"
              />
            </div>

            {/* CLASS 12 SCHOOL */}

            <div>
              <label className="block text-gray-300 mb-2">
                Class 12 School
              </label>

              <input
                type="text"
                name="class12school"
                value={formData.class12school}
                onChange={handleChange}
                className="w-full px-4 py-3 rounded-xl bg-[#1F2937] border border-gray-600 text-white outline-none focus:border-green-500"
              />
            </div>

            {/* CLASS 12 BOARD */}

            <div>
              <label className="block text-gray-300 mb-2">
                Class 12 Board
              </label>

              <input
                type="text"
                name="class12board"
                value={formData.class12board}
                onChange={handleChange}
                className="w-full px-4 py-3 rounded-xl bg-[#1F2937] border border-gray-600 text-white outline-none focus:border-green-500"
              />
            </div>

            {/* CLASS 12 MARKS */}

            <div>
              <label className="block text-gray-300 mb-2">
                Class 12 Percentage
              </label>

              <input
                type="text"
                name="class12marks"
                value={formData.class12marks}
                onChange={handleChange}
                className="w-full px-4 py-3 rounded-xl bg-[#1F2937] border border-gray-600 text-white outline-none focus:border-green-500"
              />
            </div>

            {/* BUTTONS */}

            <div className="lg:col-span-3 flex justify-end gap-4 mt-6">

              <button
                type="button"
                onClick={() => setOpenModal(false)}
                className="px-6 py-3 rounded-xl border border-gray-600 text-gray-300 hover:bg-gray-700 transition"
              >
                Cancel
              </button>

              <button
                type="submit"
                className="px-8 py-3 rounded-xl bg-green-500 hover:bg-green-600 text-white font-semibold transition"
              >
                Save Changes
              </button>

            </div>

          </form>

        </div>

      </div>

    </div>
  );
};

export default Edit_Info;