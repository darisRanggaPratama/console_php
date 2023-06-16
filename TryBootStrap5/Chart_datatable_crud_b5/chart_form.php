<div class="row">
    <div class="col">
        <p style="text-align: center; font-size: 20px; font-weight: bold;">Year</p>
    </div>
    <div class="col">
        <div class="input-group mb-3">
            <label for="year1" class="input-group-text">From</label>
            <select id="year1" name="year1" class="form-select">
                <?php
                // Array: year number
                $year = array(2021, 2022, 2023, 2024, 2025, 2026);

                // Display year
                for ($i = 0; $i < sizeof($year); $i++) {
                    echo "<option class=\"txt-blue\" value=" . $year[$i] . ">$year[$i]</option>";
                }
                ?>
            </select>
        </div>
    </div>
    <div class="col">
        <div class="input-group mb-3">
            <label for="year2" class="input-group-text">To</label>
            <select id="year2" name="year2" class="form-select">
                <?php
                // Display year
                for ($i = 0; $i < sizeof($year); $i++) {
                    echo "<option class=\"txt-red\" value=" . $year[$i] . ">$year[$i]</option>";
                }
                ?>
            </select>
        </div>
    </div>
</div>
<div class="row">
    <div class="col">
        <p style="text-align: center; font-size: 20px; font-weight: bold;">Month</p>
    </div>
    <div class="col">
        <div class="input-group mb-3">
            <label for="month1" class="input-group-text">From</label>
            <select id="month1" name="month1" class="form-select">
                <?php
                // Array: month text
                $month = array(
                    "01" => "January",
                    "02" => "February",
                    "03" => "March",
                    "04" => "April",
                    "05" => "May",
                    "06" => "June",
                    "07" => "July",
                    "08" => "August",
                    "09" => "September",
                    "10" => "October",
                    "11" => "November",
                    "12" => "December"
                );
                // Display month
                foreach ($month as $key => $value) {
                    echo "<option class=\"txt-blue\" value=" . $key . ">$value</option>";
                }
                ?>
            </select>
        </div>
    </div>
    <div class="col">
        <div class="input-group mb-3">
            <label for="month2" class="input-group-text">To</label>
            <select id="month2" name="month2" class="form-select">
                <?php
                // Display month
                foreach ($month as $key => $value) {
                    echo "<option class=\"txt-red\" value=" . $key . ">$value</option>";
                }
                ?>
            </select>
        </div>
    </div>
</div>
<div class="row">
    <div class="col" colspan="2">
        <div style="text-align: center;">
            <input style="text-align:center; font-weight: bold;" type="submit" class="form-control">
        </div>
    </div>
</div>