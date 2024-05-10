<!doctype html>
<html>
  <head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Registration</title>
    <link rel="stylesheet" href="{{ asset('css/app2.css') }}"/>  
  </head>
  <body>
    <div id="page" class="site">
      <div class="container">
        <div class="form-box">
          <div class="progress">
            <ul class="progress-steps">
              <li class="step active">
                 <span>1</span>
                 <p>Personal<br><span>25 secs to complete</span></p>
              </li>
              <li class="step">
                <span>2</span>
                <p>Contact<br><span>60 secs to complete</span></p>
              </li>
              <li class="step">
                <span>3</span>
                <p>Security<br><span>30 secs to complete</span></p>
              </li>
            </ul>
          </div>
          <form action="{{ route('user.register' , ['id' => $user->id]) }}" method="post">
         

            @csrf
            <div class="form-one form-step active">
                <div class="bg-svg"></div>
                <h2>Personal Information</h2>
                <p>Enter your personal information correctly</p>
                <div>
                  <label for="">First Name</label>
                  <input type="text" name="first_name" placeholder="e.g hiba">
                </div>
                <div>
                  <label for="">Last Name</label>
                  <input type="text" name="family_name" placeholder="e.g mimouni">
                </div>
                <div class="birth">
                  {{-- <label for="">Date Of Birth</label>
                  <div class="grouping">
                    <input type="text" patter="[0-9]*" name="day" min="0" max="31" placeholder="DD"/>
                    <input type="text" patter="[0-9]*" name="month" min="0" max="12" placeholder="MM"/>
                    <input type="text" patter="[0-9]*" name="year" min="0" max="2050" placeholder="YYYY"/>
                  </div> --}}
                  <label>University</label>
                  <input type="text" name="university" placeholder="Your university">
                </div>
                <div class="birth">
                  <label>Study Field</label>
                  <input type="text" name="study_field" placeholder="Your study field">
                </div>
                <div class="birth">
                  <label>Study Level</label>
                  <select name="study_level">
                      <option value="">Select study level</option>
                      <option value="Undergraduate">Undergraduate</option>
                      <option value="Graduate">Graduate</option>
                      <option value="Postgraduate">Postgraduate</option>
                      <option value="PhD">PhD</option>
                  </select>
                </div> 
                </div>
            <div class="form-two form-step">
              <div class="bg-svg"></div>
                <h2>Contact</h2>
                <div>
                    <label>Phone</label>
                    <input type="tel" placeholder="">
                </div>
                <div>
                  <label for="edit-pays">Pays:</label>
                  <select id="edit-pays" onchange="populateCities()">
                      <option value="">Sélectionner un pays</option>
                      <option value="Afghanistan">Afghanistan</option>
                      <option value="Albania">Albania</option>
                      <option value="Algeria">Algeria</option>
                      <option value="Andorra">Andorra</option>
                      <option value="Angola">Angola</option>
                      <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                      <option value="Argentina">Argentina</option>
                      <option value="Armenia">Armenia</option>
                      <option value="Australia">Australia</option>
                      <option value="Austria">Austria</option>
                      <option value="Azerbaijan">Azerbaijan</option>
                      <option value="Bahamas">Bahamas</option>
                      <option value="Bahrain">Bahrain</option>
                      <option value="Bangladesh">Bangladesh</option>
                      <option value="Barbados">Barbados</option>
                      <option value="Belarus">Belarus</option>
                      <option value="Belgium">Belgium</option>
                      <option value="Belize">Belize</option>
                      <option value="Benin">Benin</option>
                      <option value="Bhutan">Bhutan</option>
                      <option value="Bolivia">Bolivia</option>
                      <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                      <option value="Botswana">Botswana</option>
                      <option value="Brazil">Brazil</option>
                      <option value="Brunei">Brunei</option>
                      <option value="Bulgaria">Bulgaria</option>
                      <option value="Burkina Faso">Burkina Faso</option>
                      <option value="Burundi">Burundi</option>
                      <option value="Cabo Verde">Cabo Verde</option>
                      <option value="Cambodia">Cambodia</option>
                      <option value="Cameroon">Cameroon</option>
                      <option value="Canada">Canada</option>
                      <option value="Central African Republic">Central African Republic</option>
                      <option value="Chad">Chad</option>
                      <option value="Chile">Chile</option>
                      <option value="China">China</option>
                      <option value="Colombia">Colombia</option>
                      <option value="Comoros">Comoros</option>
                      <option value="Congo">Congo</option>
                      <option value="Costa Rica">Costa Rica</option>
                      <option value="Croatia">Croatia</option>
                      <option value="Cuba">Cuba</option>
                      <option value="Cyprus">Cyprus</option>
                      <option value="Czech Republic">Czech Republic</option>
                      <option value="Denmark">Denmark</option>
                      <option value="Djibouti">Djibouti</option>
                      <option value="Dominica">Dominica</option>
                      <option value="Dominican Republic">Dominican Republic</option>
                      <option value="Ecuador">Ecuador</option>
                      <option value="Egypt">Egypt</option>
                      <option value="El Salvador">El Salvador</option>
                      <option value="Equatorial Guinea">Equatorial Guinea</option>
                      <option value="Eritrea">Eritrea</option>
                      <option value="Estonia">Estonia</option>
                      <option value="Eswatini">Eswatini</option>
                      <option value="Ethiopia">Ethiopia</option>
                      <option value="Fiji">Fiji</option>
                      <option value="Finland">Finland</option>
                      <option value="France">France</option>
                      <option value="Gabon">Gabon</option>
                      <option value="Gambia">Gambia</option>
                      <option value="Georgia">Georgia</option>
                      <option value="Germany">Germany</option>
                      <option value="Ghana">Ghana</option>
                      <option value="Greece">Greece</option>
                      <option value="Grenada">Grenada</option>
                      <option value="Guatemala">Guatemala</option>
                      <option value="Guinea">Guinea</option>
                      <option value="Guinea-Bissau">Guinea-Bissau</option>
                      <option value="Guyana">Guyana</option>
                      <option value="Haiti">Haiti</option>
                      <option value="Honduras">Honduras</option>
                      <option value="Hungary">Hungary</option>
                      <option value="Iceland">Iceland</option>
                      <option value="India">India</option>
                      <option value="Indonesia">Indonesia</option>
                      <option value="Iran">Iran</option>
                      <option value="Iraq">Iraq</option>
                      <option value="Ireland">Ireland</option>
                      <option value="Israel">Israel</option>
                      <option value="Italy">Italy</option>
                      <option value="Jamaica">Jamaica</option>
                      <option value="Japan">Japan</option>
                      <option value="Jordan">Jordan</option>
                      <option value="Kazakhstan">Kazakhstan</option>
                      <option value="Kenya">Kenya</option>
                      <option value="Kiribati">Kiribati</option>
                      <option value="Kosovo">Kosovo</option>
                      <option value="Kuwait">Kuwait</option>
                      <option value="Kyrgyzstan">Kyrgyzstan</option>
                      <option value="Laos">Laos</option>
                      <option value="Latvia">Latvia</option>
                      <option value="Lebanon">Lebanon</option>
                      <option value="Lesotho">Lesotho</option>
                      <option value="Liberia">Liberia</option>
                      <option value="Libya">Libya</option>
                      <option value="Liechtenstein">Liechtenstein</option>
                      <option value="Lithuania">Lithuania</option>
                      <option value="Luxembourg">Luxembourg</option>
                      <option value="Madagascar">Madagascar</option>
                      <option value="Malawi">Malawi</option>
                      <option value="Malaysia">Malaysia</option>
                      <option value="Maldives">Maldives</option>
                      <option value="Mali">Mali</option>
                      <option value="Malta">Malta</option>
                      <option value="Marshall Islands">Marshall Islands</option>
                      <option value="Mauritania">Mauritania</option>
                      <option value="Mauritius">Mauritius</option>
                      <option value="Mexico">Mexico</option>
                      <option value="Micronesia">Micronesia</option>
                      <option value="Moldova">Moldova</option>
                      <option value="Monaco">Monaco</option>
                      <option value="Mongolia">Mongolia</option>
                      <option value="Montenegro">Montenegro</option>
                      <option value="Morocco">Morocco</option>
                      <option value="Mozambique">Mozambique</option>
                      <option value="Myanmar">Myanmar</option>
                      <option value="Namibia">Namibia</option>
                      <option value="Nauru">Nauru</option>
                      <option value="Nepal">Nepal</option>
                      <option value="Netherlands">Netherlands</option>
                      <option value="New Zealand">New Zealand</option>
                      <option value="Nicaragua">Nicaragua</option>
                      <option value="Niger">Niger</option>
                      <option value="Nigeria">Nigeria</option>
                      <option value="North Korea">North Korea</option>
                      <option value="North Macedonia">North Macedonia</option>
                      <option value="Norway">Norway</option>
                      <option value="Oman">Oman</option>
                      <option value="Pakistan">Pakistan</option>
                      <option value="Palau">Palau</option>
                      <option value="Palestine">Palestine</option>
                      <option value="Panama">Panama</option>
                      <option value="Papua New Guinea">Papua New Guinea</option>
                      <option value="Paraguay">Paraguay</option>
                      <option value="Peru">Peru</option>
                      <option value="Philippines">Philippines</option>
                      <option value="Poland">Poland</option>
                      <option value="Portugal">Portugal</option>
                      <option value="Qatar">Qatar</option>
                      <option value="Romania">Romania</option>
                      <option value="Russia">Russia</option>
                      <option value="Rwanda">Rwanda</option>
                      <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                      <option value="Saint Lucia">Saint Lucia</option>
                      <option value="Saint Vincent and the Grenadines">Saint Vincent and the Grenadines</option>
                      <option value="Samoa">Samoa</option>
                      <option value="San Marino">San Marino</option>
                      <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                      <option value="Saudi Arabia">Saudi Arabia</option>
                      <option value="Senegal">Senegal</option>
                      <option value="Serbia">Serbia</option>
                      <option value="Seychelles">Seychelles</option>
                      <option value="Sierra Leone">Sierra Leone</option>
                      <option value="Singapore">Singapore</option>
                      <option value="Slovakia">Slovakia</option>
                      <option value="Slovenia">Slovenia</option>
                      <option value="Solomon Islands">Solomon Islands</option>
                      <option value="Somalia">Somalia</option>
                      <option value="South Africa">South Africa</option>
                      <option value="South Korea">South Korea</option>
                      <option value="South Sudan">South Sudan</option>
                      <option value="Spain">Spain</option>
                      <option value="Sri Lanka">Sri Lanka</option>
                      <option value="Sudan">Sudan</option>
                      <option value="Suriname">Suriname</option>
                      <option value="Sweden">Sweden</option>
                      <option value="Switzerland">Switzerland</option>
                      <option value="Syria">Syria</option>
                      <option value="Taiwan">Taiwan</option>
                      <option value="Tajikistan">Tajikistan</option>
                      <option value="Tanzania">Tanzania</option>
                      <option value="Thailand">Thailand</option>
                      <option value="Timor-Leste">Timor-Leste</option>
                      <option value="Togo">Togo</option>
                      <option value="Tonga">Tonga</option>
                      <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                      <option value="Tunisia">Tunisia</option>
                      <option value="Turkey">Turkey</option>
                      <option value="Turkmenistan">Turkmenistan</option>
                      <option value="Tuvalu">Tuvalu</option>
                      <option value="Uganda">Uganda</option>
                      <option value="Ukraine">Ukraine</option>
                      <option value="United Arab Emirates">United Arab Emirates</option>
                      <option value="United Kingdom">United Kingdom</option>
                      <option value="United States">United States</option>
                      <option value="Uruguay">Uruguay</option>
                      <option value="Uzbekistan">Uzbekistan</option>
                      <option value="Vanuatu">Vanuatu</option>
                      <option value="Vatican City">Vatican City</option>
                      <option value="Venezuela">Venezuela</option>
                      <option value="Vietnam">Vietnam</option>
                      <option value="Yemen">Yemen</option>
                      <option value="Zambia">Zambia</option>
                      <option value="Zimbabwe">Zimbabwe</option>
                  </select><br>
                  <label for="edit-ville">Ville:</label>
                  
                      <select id="edit-city">
                          <option value="">Select a city</option>
                          <!-- Cities for selected country will be populated here -->
                      </select>
                </div>
            </div>
            <div class="form-three form-step">
              <div class="bg-svg"></div>
              <h2>Security</h2>
              <div>
                <label>Email</label>
                <input type="email" name="email" placeholder="your email address">
              </div>
              <div>
                <label>Password</label>
                <input type="password" name="password" placeholder="password">

              </div>
              <div>
                <input type="password"placeholder="Confirm Password">
              </div>
            </div>
          
            <input type="hidden" name="user_id" value="{{ $user->id }}">

            <div class="btn-group">
              <button type="button" class="btn-prev" disabled>Back</button>
              <button type="button" class="btn-next" >Next Step</button>
              <button type="submit" class="btn-submit">Submit</button>

            </div>
          </form>
        </div>
      </div>
    </div>
    {{-- <script>
      const nextButton = document.querySelector('.btn-next');
      const prevButton = document.querySelector('.btn-prev');
      const steps = document.querySelectorAll('.step');
    
      const formSteps = document.querySelectorAll('.form-step');
      let active = 1;
    
      nextButton.addEventListener('click', () => {
        active++;
        if (active > steps.length) {
          active = steps.length;
        }
        updateProgress();
      });
    
      prevButton.addEventListener('click', () => {
        active--;
        if (active < 1) {
          active = 1;
        }
        updateProgress();
      });
    
      const updateProgress = () => {
        steps.forEach((step, i) => {
          if (i === active - 1) {
            step.classList.add('active');
            formSteps[i].classList.add('active');
          } else {
            step.classList.remove('active');
            formSteps[i].classList.remove('active');
          }
        });
        if (active === 1) {
          prevButton.disabled = true;
        } else if (active === steps.length) {
          nextButton.disabled = true;
        } else {
          prevButton.disabled = false;
          nextButton.disabled = false;
        }
      };
    </script>
     --}}
     <script>
      const nextButton = document.querySelector('.btn-next');
      const prevButton = document.querySelector('.btn-prev');
      const submitButton = document.querySelector('.btn-submit'); // Select the submit button
      const steps = document.querySelectorAll('.step');
    
      const formSteps = document.querySelectorAll('.form-step');
      let active = 1;
    
      nextButton.addEventListener('click', () => {
        active++;
        if (active > steps.length) {
          active = steps.length;
        }
        updateProgress();
      });
    
      prevButton.addEventListener('click', () => {
        active--;
        if (active < 1) {
          active = 1;
        }
        updateProgress();
      });
    
      const updateProgress = () => {
        steps.forEach((step, i) => {
          if (i === active - 1) {
            step.classList.add('active');
            formSteps[i].classList.add('active');
          } else {
            step.classList.remove('active');
            formSteps[i].classList.remove('active');
          }
        });
        if (active === 1) {
          prevButton.disabled = true;
        } else if (active === steps.length) {
          nextButton.disabled = true;
          submitButton.style.display = 'block'; // Display the submit button when on the last step
        } else {
          prevButton.disabled = false;
          nextButton.disabled = false;
          submitButton.style.display = 'none'; // Hide the submit button when not on the last step
        }
      };
    </script>
    <script>const citiesByCountry = {
        Afghanistan: ['Kabul', 'Herat', 'Kandahar', 'Mazar-i-Sharif'],
        Albania: ['Tirana', 'Durrës', 'Vlorë', 'Shkodër'],
        Algeria: ['Algiers', 'Oran', 'Constantine', 'Annaba'],
        Andorra: ['Andorra la Vella', 'Escaldes-Engordany', 'Encamp', 'Sant Julià de Lòria'],
        Angola: ['Luanda', 'Huambo', 'Lobito', 'Benguela'],
        'Antigua and Barbuda': ['St. Johns', 'All Saints', 'Liberta', 'Potters Village'],
        Argentina: ['Buenos Aires', 'Córdoba', 'Rosario', 'Mendoza'],
        Armenia: ['Yerevan', 'Gyumri', 'Vanadzor', 'Vagharshapat'],
        Australia: ['Sydney', 'Melbourne', 'Brisbane', 'Perth'],
        Austria: ['Vienna', 'Graz', 'Linz', 'Salzburg'],
        Azerbaijan: ['Baku', 'Ganja', 'Sumqayit', 'Mingachevir'],
        Bahamas: ['Nassau', 'Freeport', 'Lucaya', 'West End'],
        Bahrain: ['Manama', 'Riffa', 'Muharraq', 'Hamad Town'],
        Bangladesh: ['Dhaka', 'Chittagong', 'Khulna', 'Rajshahi'],
        Barbados: ['Bridgetown', 'Speightstown', 'Oistins', 'Holetown'],
        Belarus: ['Minsk', 'Gomel', 'Mogilev', 'Vitebsk'],
        Belgium: ['Brussels', 'Antwerp', 'Ghent', 'Charleroi'],
        Belize: ['Belmopan', 'Belize City', 'San Ignacio', 'Orange Walk'],
        Benin: ['Porto-Novo', 'Cotonou', 'Parakou', 'Djougou'],
        Bhutan: ['Thimphu', 'Phuntsholing', 'Punakha', 'Jakar'],
        Bolivia: ['La Paz', 'Sucre', 'Santa Cruz de la Sierra', 'El Alto'],
        'Bosnia and Herzegovina': ['Sarajevo', 'Banja Luka', 'Tuzla', 'Zenica'],
        Botswana: ['Gaborone', 'Francistown', 'Molepolole', 'Serowe'],
        Brazil: ['Brasília', 'São Paulo', 'Rio de Janeiro', 'Salvador'],
        Brunei: ['Bandar Seri Begawan', 'Kuala Belait', 'Seria', 'Tutong'],
        Bulgaria: ['Sofia', 'Plovdiv', 'Varna', 'Burgas'],
        'Burkina Faso': ['Ouagadougou', 'Bobo-Dioulasso', 'Koudougou', 'Ouahigouya'],
        Burundi: ['Bujumbura', 'Gitega', 'Muyinga', 'Ruyigi'],
        'Cabo Verde': ['Praia', 'Mindelo', 'Santa Maria', 'Cova Figueira'],
        Cambodia: ['Phnom Penh', 'Siem Reap', 'Sihanoukville', 'Battambang'],
        Cameroon: ['Yaoundé', 'Douala', 'Bamenda', 'Bafoussam'],
        Canada: ['Ottawa', 'Toronto', 'Montreal', 'Vancouver'],
        'Central African Republic': ['Bangui', 'Bimbo', 'Berbérati', 'Kaga-Bandoro'],
        Chad: ['N Djamena', 'Moundou', 'Sarh', 'Abeche'],
        Chile: ['Santiago', 'Puente Alto', 'Antofagasta', 'Viña del Mar'],
        China: ['Beijing', 'Shanghai', 'Guangzhou', 'Shenzhen'],
        Colombia: ['Bogotá', 'Medellín', 'Cali', 'Barranquilla'],
        Comoros: ['Moroni', 'Mutsamudu', 'Fomboni', 'Domoni'],
        Congo: ['Brazzaville', 'Pointe-Noire', 'Dolisie', 'Nkayi'],
        'Costa Rica': ['San José', 'Puerto Limón', 'San Francisco', 'Alajuela'],
        Croatia: ['Zagreb', 'Split', 'Rijeka', 'Osijek'],
        Cuba: ['Havana', 'Santiago de Cuba', 'Camagüey', 'Holguín'],
        Cyprus: ['Nicosia', 'Limassol', 'Larnaca', 'Famagusta'],
        'Czech Republic': ['Prague', 'Brno', 'Ostrava', 'Plzeň'],
        Denmark: ['Copenhagen', 'Aarhus', 'Odense', 'Aalborg'],
        Djibouti: ['Djibouti City', 'Ali Sabieh', 'Dikhil', 'Tadjoura'],
        Dominica: ['Roseau', 'Portsmouth', 'Marigot', 'Berekua'],
        'Dominican Republic': ['Santo Domingo', 'Santiago', 'Santo Domingo Este', 'San Pedro de Macorís'],
        Ecuador: ['Quito', 'Guayaquil', 'Cuenca', 'Santo Domingo de los Colorados'],
        Egypt: ['Cairo', 'Alexandria', 'Giza', 'Shubra El-Kheima'],
        'El Salvador': ['San Salvador', 'Santa Ana', 'Soyapango', 'San Miguel'],
        'Equatorial Guinea': ['Malabo', 'Bata', 'Ebebiyin', 'Aconibe'],
        Eritrea: ['Asmara', 'Keren', 'Massawa', 'Assab'],
        Estonia: ['Tallinn', 'Tartu', 'Narva', 'Pärnu'],
        Eswatini: ['Mbabane', 'Manzini', 'Lobamba', 'Siteki'],
        Ethiopia: ['Addis Ababa', 'Dire Dawa', 'Mekelle', 'Gondar'],
        Fiji: ['Suva', 'Lautoka', 'Nadi', 'Labasa'],
        Finland: ['Helsinki', 'Espoo', 'Tampere', 'Vantaa'],
        France: ['Paris', 'Marseille', 'Lyon', 'Toulouse'],
        Gabon: ['Libreville', 'Port-Gentil', 'Franceville', 'Oyem'],
        Gambia: ['Banjul', 'Serekunda', 'Brikama', 'Bakau'],
        Georgia: ['Tbilisi', 'Kutaisi', 'Batumi', 'Rustavi'],
        Germany: ['Berlin', 'Hamburg', 'Munich', 'Cologne'],
        Ghana: ['Accra', 'Kumasi', 'Tamale', 'Takoradi'],
        Greece: ['Athens', 'Thessaloniki', 'Patras', 'Heraklion'],
        Grenada: ['St. George s', 'Gouyave', 'Grenville', 'Victoria'],
        Guatemala: ['Guatemala City', 'Mixco', 'Villa Nueva', 'Quetzaltenango'],
        Guinea: ['Conakry', 'Nzérékoré', 'Kindia', 'Kankan'],
        'Guinea-Bissau': ['Bissau', 'Bafatá', 'Gabú', 'Bissora'],
        Guyana: ['Georgetown', 'Linden', 'New Amsterdam', 'Bartica'],
        Haiti: ['Port-au-Prince', 'Carrefour', 'Delmas', 'Pétion-Ville'],
        Honduras: ['Tegucigalpa', 'San Pedro Sula', 'Choloma', 'La Ceiba'],
        Hungary: ['Budapest', 'Debrecen', 'Szeged', 'Miskolc'],
        Iceland: ['Reykjavík', 'Kópavogur', 'Hafnarfjörður', 'Akureyri'],
        India: ['New Delhi', 'Mumbai', 'Bangalore', 'Kolkata'],
        Indonesia: ['Jakarta', 'Surabaya', 'Bandung', 'Medan'],
        Iran: ['Tehran', 'Mashhad', 'Isfahan', 'Karaj'],
        Iraq: ['Baghdad', 'Basra', 'Sulaymaniyah', 'Erbil'],
        Ireland: ['Dublin', 'Cork', 'Limerick', 'Galway'],
        Israel: ['Jerusalem', 'Tel Aviv', 'Haifa', 'Rishon LeZion'],
        Italy: ['Rome', 'Milan', 'Naples', 'Turin'],
        Jamaica: ['Kingston', 'Spanish Town', 'Portmore', 'Montego Bay'],
        Japan: ['Tokyo', 'Yokohama', 'Osaka', 'Nagoya'],
        Jordan: ['Amman', 'Zarqa', 'Irbid', 'Russeifa'],
        Kazakhstan: ['Nur-Sultan', 'Almaty', 'Shymkent', 'Karaganda'],
        Kenya: ['Nairobi', 'Mombasa', 'Kisumu', 'Nakuru'],
        Kiribati: ['South Tarawa', 'Betio Village', 'Bikenibeu Village', 'Temwaiku Village'],
        Kosovo: ['Pristina', 'Prizren', 'Gjilan', 'Peć'],
        Kuwait: ['Kuwait City', 'Al Ahmadi', 'Hawalli', 'As Salimiyah'],
        Kyrgyzstan: ['Bishkek', 'Osh', 'Jalal-Abad', 'Karakol'],
        Laos: ['Vientiane', 'Pakxe', 'Savannakhet', 'Luang Prabang'],
        Latvia: ['Riga', 'Daugavpils', 'Liepāja', 'Jelgava'],
        Lebanon: ['Beirut', 'Tripoli', 'Sidon', 'Tyre'],
        Lesotho: ['Maseru', 'Teyateyaneng', 'Mafeteng', 'Hlotse'],
        Liberia: ['Monrovia', 'Gbarnga', 'Bensonville', 'Kakata'],
        Libya: ['Tripoli', 'Benghazi', 'Misrata', 'Tobruk'],
        Liechtenstein: ['Vaduz', 'Schellenberg', 'Triesen', 'Balzers'],
        Lithuania: ['Vilnius', 'Kaunas', 'Klaipėda', 'Šiauliai'],
        Luxembourg: ['Luxembourg City', 'Esch-sur-Alzette', 'Differdange', 'Dudelange'],
        Madagascar: ['Antananarivo', 'Toamasina', 'Antsirabe', 'Fianarantsoa'],
        Malawi: ['Lilongwe', 'Blantyre', 'Mzuzu', 'Zomba'],
        Malaysia: ['Kuala Lumpur', 'George Town', 'Ipoh', 'Petaling Jaya'],
        Maldives: ['Malé', 'Addu City', 'Fuvahmulah', 'Hithadhoo'],
        Mali: ['Bamako', 'Sikasso', 'Mopti', 'Koutiala'],
        Malta: ['Valletta', 'Birkirkara', 'Mosta', 'Qormi'],
        'Marshall Islands': ['Majuro', 'Kwajalein', 'Ebeye', 'Arno'],
        Mauritania: ['Nouakchott', 'Nouadhibou', 'Néma', 'Kaédi'],
        Mauritius: ['Port Louis', 'Beau Bassin-Rose Hill', 'Vacoas-Phoenix', 'Curepipe'],
        Mexico: ['Mexico City', 'Guadalajara', 'Monterrey', 'Puebla City'],
        Micronesia: ['Palikir', 'Weno', 'Tofol', 'Kolonia'],
        Moldova: ['Chișinău', 'Tiraspol', 'Bălți', 'Bender'],
        Monaco: ['Monaco', 'Monte Carlo', 'La Condamine', 'Fontvieille'],
        Mongolia: ['Ulaanbaatar', 'Darkhan', 'Erdenet', 'Choibalsan'],
        Montenegro: ['Podgorica', 'Nikšić', 'Herceg Novi', 'Pljevlja'],
        Morocco: ['Rabat', 'Casablanca', 'Fes', 'Marrakesh'],
        Mozambique: ['Maputo', 'Matola', 'Beira', 'Nampula'],
        Myanmar: ['Naypyidaw', 'Yangon', 'Mandalay', 'Mawlamyine'],
        Namibia: ['Windhoek', 'Rundu', 'Walvis Bay', 'Swakopmund'],
        Nauru: ['Yaren', 'Denigomodu', 'Anabar', 'Uaboe'],
        Nepal: ['Kathmandu', 'Pokhara', 'Patan', 'Biratnagar'],
        Netherlands: ['Amsterdam', 'Rotterdam', 'The Hague', 'Utrecht'],
        'New Zealand': ['Wellington', 'Auckland', 'Christchurch', 'Hamilton'],
        Nicaragua: ['Managua', 'León', 'Masaya', 'Matagalpa'],
        Niger: ['Niamey', 'Zinder', 'Maradi', 'Agadez'],
        Nigeria: ['Abuja', 'Lagos', 'Kano', 'Ibadan'],
        'North Korea': ['Pyongyang', 'Hamhung', 'Chongjin', 'Nampo'],
        'North Macedonia': ['Skopje', 'Bitola', 'Kumanovo', 'Prilep'],
        Norway: ['Oslo', 'Bergen', 'Stavanger', 'Trondheim'],
        Oman: ['Muscat', 'Seeb', 'Salalah', 'Bawshar'],
        Pakistan: ['Islamabad', 'Karachi', 'Lahore', 'Faisalabad'],
        Palau: ['Ngerulmud', 'Koror', 'Melekeok', 'Urdmang'],
        Palestine: ['Jerusalem', 'Gaza City', 'Hebron', 'Nablus'],
        Panama: ['Panama City', 'San Miguelito', 'Tocumen', 'David'],
        'Papua New Guinea': ['Port Moresby', 'Lae', 'Arawa', 'Mount Hagen'],
        Paraguay: ['Asunción', 'Ciudad del Este', 'San Lorenzo', 'Luque'],
        Peru: ['Lima', 'Arequipa', 'Callao', 'Trujillo'],
        Philippines: ['Manila', 'Quezon City', 'Davao City', 'Caloocan'],
        Poland: ['Warsaw', 'Kraków', 'Łódź', 'Wrocław'],
        Portugal: ['Lisbon', 'Porto', 'Vila Nova de Gaia', 'Amadora'],
        Qatar: ['Doha', 'Al Wakrah', 'Al Khor', 'Umm Salal'],
        Romania: ['Bucharest', 'Cluj-Napoca', 'Timișoara', 'Iași'],
        Russia: ['Moscow', 'Saint Petersburg', 'Novosibirsk', 'Yekaterinburg'],
        Rwanda: ['Kigali', 'Butare', 'Gitarama', 'Ruhengeri'],
        'Saint Kitts and Nevis': ['Basseterre', 'Charlestown', 'Sandy Point Town', 'Monkey Hill'],
        'Saint Lucia': ['Castries', 'Vieux Fort', 'Micoud', 'Soufrière'],
        'Saint Vincent and the Grenadines': ['Kingstown', 'Kingstown Park', 'Georgetown', 'Byera Village'],
        Samoa: ['Apia', 'Vaitele', 'Faleula', 'Siusega'],
        'San Marino': ['San Marino', 'Serravalle', 'Borgo Maggiore', 'Domagnano'],
        'Sao Tome and Principe': ['São Tomé', 'Neves', 'Guadalupe', 'Santana'],
        'Saudi Arabia': ['Riyadh', 'Jeddah', 'Mecca', 'Medina'],
        Senegal: ['Dakar', 'Thiès', 'Kaolack', 'Ziguinchor'],
        Serbia: ['Belgrade', 'Novi Sad', 'Niš', 'Kragujevac'],
        Seychelles: ['Victoria', 'Anse Boileau', 'Beau Vallon', 'Anse Royale'],
        'Sierra Leone': ['Freetown', 'Kenema', 'Bo', 'Koidu Town'],
        Singapore: ['Singapore'],
        Slovakia: ['Bratislava', 'Košice', 'Prešov', 'Žilina'],
        Slovenia: ['Ljubljana', 'Maribor', 'Celje', 'Kranj'],
        'Solomon Islands': ['Honiara', 'Auki', 'Gizo', 'Kirakira'],
        Somalia: ['Mogadishu', 'Hargeisa', 'Kismayo', 'Marka'],
        'South Africa': ['Pretoria', 'Johannesburg', 'Cape Town', 'Durban'],
        'South Korea': ['Seoul', 'Busan', 'Incheon', 'Daegu'],
        'South Sudan': ['Juba', 'Wau', 'Malakal', 'Bor'],
        Spain: ['Madrid', 'Barcelona', 'Valencia', 'Seville'],
        Sri_Lanka: ['Colombo', 'Dehiwala-Mount Lavinia', 'Moratuwa', 'Jaffna'],
        Sudan: ['Khartoum', 'Omdurman', 'Nyala', 'Port Sudan'],
        Suriname: ['Paramaribo', 'Lelydorp', 'Nieuw Nickerie', 'Moengo'],
        Sweden: ['Stockholm', 'Gothenburg', 'Malmö', 'Uppsala'],
        Switzerland: ['Zurich', 'Geneva', 'Basel', 'Lausanne'],
        Syria: ['Damascus', 'Aleppo', 'Homs', 'Hama'],
        Taiwan: ['Taipei', 'New Taipei', 'Kaohsiung', 'Taichung'],
        Tajikistan: ['Dushanbe', 'Khujand', 'Kulob', 'Qurghonteppa'],
        Tanzania: ['Dodoma', 'Dar es Salaam', 'Mwanza', 'Arusha'],
        Thailand: ['Bangkok', 'Nonthaburi', 'Nakhon Ratchasima', 'Chiang Mai'],
        'Timor-Leste': ['Dili', 'Maliana', 'Suai', 'Liquiçá'],
        Togo: ['Lomé', 'Sokodé', 'Kara', 'Atakpamé'],
        Tonga: ['Nukuʻalofa', 'Neiafu', 'Vaini', 'Haveluloto'],
        'Trinidad and Tobago': ['Port of Spain', 'Chaguanas', 'San Fernando', 'Arima'],
        Tunisia: ['Tunis', 'Sfax', 'Sousse', 'Kairouan'],
        Turkey: ['Ankara', 'Istanbul', 'Izmir', 'Bursa'],
        Turkmenistan: ['Ashgabat', 'Turkmenabat', 'Daşoguz', 'Mary'],
        Tuvalu: ['Funafuti', 'Fongafale', 'Vaiaku', 'Tanrake'],
        Uganda: ['Kampala', 'Gulu', 'Lira', 'Mbarara'],
        Ukraine: ['Kyiv', 'Kharkiv', 'Odessa', 'Dnipro'],
        'United Arab Emirates': ['Abu Dhabi', 'Dubai', 'Sharjah', 'Al Ain'],
        'United Kingdom': ['London', 'Birmingham', 'Manchester', 'Glasgow'],
        'United States': ['Washington D.C.', 'New York City', 'Los Angeles', 'Chicago'],
        Uruguay: ['Montevideo', 'Salto', 'Paysandú', 'Las Piedras'],
        Uzbekistan: ['Tashkent', 'Namangan', 'Samarkand', 'Andijan'],
        Vanuatu: ['Port Vila', 'Luganville', 'Norsup', 'Port-Olry'],
        'Vatican City': ['Vatican City'],
        Venezuela: ['Caracas', 'Maracaibo', 'Valencia', 'Barquisimeto'],
        Vietnam: ['Hanoi', 'Ho Chi Minh City', 'Da Nang', 'Haiphong'],
        Yemen: ['Sanaa', 'Aden', 'Taiz', 'Al Hudaydah'],
        Zambia: ['Lusaka', 'Kitwe', 'Ndola', 'Kabwe'],
        Zimbabwe: ['Harare', 'Bulawayo', 'Chitungwiza', 'Mutare']
    };
    // Function to populate cities dropdown based on selected country
    function populateCities() {
        var countrySelect = document.getElementById('edit-pays');
        var citySelect = document.getElementById('edit-city');
        var selectedCountry = countrySelect.value;
        var cities = citiesByCountry[selectedCountry] || [];

        // Clear previous options
        citySelect.innerHTML = '';

        // Add default option
        var defaultOption = document.createElement('option');
        defaultOption.text = 'Select a city';
        defaultOption.value = '';
        citySelect.appendChild(defaultOption);

        // Add cities for the selected country
        cities.forEach(function(city) {
            var option = document.createElement('option');
            option.text = city;
            option.value = city;
            citySelect.appendChild(option);
        });
    }</script>
    
  </body>
</html>