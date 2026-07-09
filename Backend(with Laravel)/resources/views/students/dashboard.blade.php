@extends('page_layouts.studentdashboard')

@section('content')

<div class="container">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <form method="POST" action="{{ route('students.store') }}">
            @csrf
            <h2 class="text-center">Student Registration Form</h2>
        <div class="row jumbotron">
            <div class="col-sm-6 form-group">
                <label for="name-f">First Name</label>
                <input type="text" class="form-control" name="fname" id="name-f" placeholder="Enter your first name." required>
            </div>
            <div class="col-sm-6 form-group">
                <label for="name-l">Last name</label>
                <input type="text" class="form-control" name="lname" id="name-l" placeholder="Enter your last name." required>
            </div>
            <div class="col-sm-6 form-group">
                <label for="email">Email</label>
                <input 
                type="email"
                class="form-control"
                name="email"
                id="email"
                value="{{ auth()->check() ? auth()->user()->email : '' }}"
                readonly
                required>
            </div>
            <div class="col-sm-6 form-group">
                <label for="address-1">Address Line-1</label>
                <input type="address" class="form-control" name="Locality" id="address-1" placeholder="Locality/House/Street no." required>
            </div>
            <div class="col-sm-6 form-group">
                <label for="address-2">Address Line-2</label>
                <input type="address" class="form-control" name="address" id="address-2" placeholder="Village/City Name." required>
            </div>
            <div class="col-sm-3 form-group">
                <label for="State">State</label>
                <input type="address" class="form-control" name="State" id="State" placeholder="Enter your state name." required>
            </div>
            <div class="col-sm-3 form-group">
                <label for="zip">Nearest City</label>
                <input type="Address" class="form-control" name="City" id="City" placeholder="Enter Your" required>
            </div>
            <div class="col-sm-6 form-group">
                <label for="Date">Date Of Birth</label>
                <input type="Date" name="dob" class="form-control" id="Date" placeholder="" required>
            </div>
            <div class="col-sm-6 form-group">
                <label for="sex">Gender</label>
                <select name="gender" id="sex" class="form-control browser-default custom-select" required>
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="Other">Other</option>
            </select>
            </div>
            <div class="col-sm-6  form-group">
                <label for="tel">Phone</label>
                <input type="tel" name="phone" class="form-control" id="tel" placeholder="Enter Your Contact Number." required>
            </div>
            <div class="col-sm-6 form-group">
                <label for="exam">Exam You Want to Take</label>
                <select name="exam" id="exam" class="form-control browser-default custom-select">
                <option>Choose a Exam</option>    
                <option value="jee">JEE or Other Engineering Exams</option>
                <option value="neet">NEET</option>
                <option value="clat">CLAT</option>

            </select>
            </div>
            <div class="col-sm-4  form-group">
                <label for="School">School Name(Class 10th or eqivalent)</label>
                <input type="text" name="studentschoolname" class="form-control" id="studentschoolname" placeholder="Enter Your School Name" required>
            </div>
            <div class="col-sm-4 form-group">
                <label for="tel">Board</label>
                <select name="studentboard" id="studentboard" class="form-control browser-default custom-select">
                <option>Choose the Board Exams</option>
                <option value="ICSE">Council for the Indian School Certificate Examinations(ICSE)</option>
                <option value="CBSE">Central Board Of Secondary Education(CBSE)</option>
                <option value="WestBengal-Board">West Bengal Board(Madhyamik)</option>
                <option value="Bihar-Board">Bihar Board</option> 
                <option value="Jharkhand-Board">Jharkhand Board</option>

            </select>
            </div>
            <div class="col-sm-4  form-group">
                <label for="studentmarks">Marks(in percentage %)</label>
                <input type="text"
                name="studentclass10marks"
                class="form-control"
                id="studentclass10marks"
                placeholder="e.g., 85.75"
                pattern="^\d{1,2}\.\d{2}$"
                title="Enter a number with exactly 2 decimal places (e.g., 89.50)"
                required>
            </div>
            <div class="col-sm-4  form-group">
                <label for="School">School Name(Class 12th or eqivalent)</label>
                <input type="text" name="student12schoolname" class="form-control" id="studentschoolname" placeholder="Enter Your School Name." required>
            </div>
            <div class="col-sm-4 form-group">
                <label for="tel">Board</label>
                <select name="studentboard12" id="studentboard12" class="form-control browser-default custom-select">
                <option>Choose the Board Exams</option>
                <option value="ISC">Council for the Indian School Certificate Examinations(ISC)</option>
                <option value="HS">Central Board Of Secondary Education(CBSE)</option>
                <option value="WestBengal-Board12">West Bengal Board(Uchha Madhyamik)</option>
                <option value="Bihar-Board12">Bihar Board</option>
                <option value="Jharkhand-Board12">Jharkhand Board</option>

            </select>
            </div>
            <div class="col-sm-4  form-group">
                <label for="studentmarks12">Marks(in percentage %)</label>
                <input type="text"
                        name="studentclass12marks"
                        class="form-control"
                        id="studentclass12marks"
                        placeholder="e.g., 85.75"
                        pattern="^\d{1,2}\.\d{2}$"
                        title="Enter a number with exactly 2 decimal places (e.g., 89.50)"
                        required>
            </div>
            <div class="col-sm-12">
                <input type="checkbox" class="form-check d-inline" id="chb" required><label for="chb" class="form-check-label">&nbsp;I accept all <a href=""> terms and conditions</a>.
                </label>
            </div>

            <div class="col-sm-12 form-group mb-0">
               <button class="btn btn-primary float-right">Submit</button>
            </div>
            
        </div>
        </form>
    </div>
@endsection
