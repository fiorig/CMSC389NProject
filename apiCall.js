var unirest = require('unirest');
main(stringArray);
function main(stringArray) {
  if(stringArray.length !== 0 && stringArray !== null) {
   getAverage(stringArray, function(result) {
    parseAccountResult(result);
  });

  }
}
function getAverage(stringArray, callback) {
  var sumResult = {
    "neg": 0,
    "neutral": 0,
    "pos": 0
  };

  for(let i = 0; i < stringArray.length; i++) {
  getSentiment(stringArray[i], function(senti) {
    if(senti !== -1) {
    sumResult["neg"] += senti.probability.neg;
    sumResult["neutral"] += senti.probability.neutral;
    sumResult["pos"] += senti.probability.pos;
  }
  if(i = stringArray.length - 1) {
    sumResult["neg"] = sumResult.neg;
    sumResult["neutral"] = sumResult.neutral;
    sumResult["pos"] = sumResult.pos;
    callback(sumResult);
  }
  });
  }
}
function getSentiment(str, callback) {
unirest.post("https://japerk-text-processing.p.mashape.com/sentiment/")
.header("X-Mashape-Key", "gpYkVzQBIOmsh1sTBGElgy92MnTOp1IKaAdjsnPI3tI94CEKn0")
.header("Content-Type", "application/x-www-form-urlencoded")
.header("Accept", "application/json")
.send("language=english")
.send(`text=${str}`)
.end(function (result) {
  if (result.statusCode != 200) {
          callback(-1);
      } else {
        callback(result.body);
      }
});
}
/*
function getPostive(stringArray) {
  console.log("ok");
  let found = 0;
  let most = getSentiment(stringArray[0]);
  for(let i = 1; i < stringArray.length; i++) {
    let temp = getSentiment(stringArray[i]);
    if(temp.pos > most.pos) {
      most = temp;
    }
  }
  resultDiv.innerHTML = `WORKS!!!`;
} */

function getNegative(stringArray) {
  let found = 0;
  let most = getSentiment(stringArray[0]);
  for(let i = 1; i < stringArray.length; i++) {
    let temp = getSentiment(stringArray[i]);
    if(temp.neg > most.neg) {
      found = i;
    }
  }
  return stringArray[found];
}

function parseAccountResult(sentiment) {
  let resultDiv = document.getElementById("resultDiv");
  if(sentiment["pos"] >= sentiment["neg"] && sentiment["pos"] >= sentiment["neutral"]) {
    resultDiv.innerHTML = "<h5 style = 'text-align: center;'> You have a Positive Account</h5><br>";
  } else if (sentiment["neg"] >= sentiment["pos"] && sentiment["neg"] >= sentiment["neutral"]) {
    resultDiv.innerHTML = "<h5 style = 'text-align: center;'> You have a Negative Account</h5><br>";
  } else {
    resultDiv.innerHTML = "<h5 style = 'text-align: center;'> You have a Neutral Account</h5><br>";
  }
    resultDiv.innerHTML += `<h6 style = 'text-align: center;'>A ${sentiment["pos"].toFixed(2)} probability of being viewed positivity!</h6><br>`;
    resultDiv.innerHTML += `<h6 style = 'text-align: center;'>A ${sentiment["neg"].toFixed(2)} probability of being viewed negatively!</h6><br>`;
    resultDiv.innerHTML += `<h6 style = 'text-align: center;'>A ${sentiment["neutral"].toFixed(2)} probability of being viewed neutral!</h6><br>`;
}

/*
{
  "label": "pos",
  "probability": {
    "neg": 0.39680317,
    "neutral": 0.28207585,
    "pos": 0.60319686
  }
}
*/
