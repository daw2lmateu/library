const baseurl = 'https://dataservice.accuweather.com';
const apikey  = 'nhiA6uhQHEbwlS5BD9f8XAiHruMBfapu';

$.getJSON(`${baseurl}/locations/v1/postalcodes/search`, {
    'apikey': apikey,
    'q': '18612'
}).then(function (locData) {
    return $.getJSON(`${baseurl}/currentconditions/v1/${locData[0].Key}`, {
        'apikey': apikey
    });
}).then(function (tempData) {
    const temp = tempData[0].Temperature.Imperial;
    console.log(`${temp.Value}${temp.Unit}`);
    
    console.log(tempData);
    console.log(tempData[0].WeatherText);
    console.log(tempData[0].WeatherIcon);

    document.getElementById('cloud').src = "img/weather/" + tempData[0].WeatherIcon +".png";
    document.getElementById('temperature').innerHTML = " - " + tempData[0].Temperature.Imperial.Value + " " +  tempData[0].Temperature.Imperial.Unit;
});