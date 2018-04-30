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
    sumResult["neg"] = (sumResult.neg)/stringArray.length;
    sumResult["neutral"] = (sumResult.neutral)/stringArray.length;
    sumResult["pos"] = (sumResult.pos)/stringArray.length;
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

function getPostive(stringArray) {
  let found = 0;
  let most = getSentiment(stringArray[0]);
  for(let i = 1; i < stringArray.length; i++) {
    let temp = getSentiment(stringArray[i]);
    if(temp.pos > most.pos) {
      most = temp;
    }
  }
  return stringArray[found];
}

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
      resultDiv.innerHTML = `This is a positive account with a ${sentiment["pos"]} probability of being viewed positivity!`;
    } else if (sentiment["neg"] >= sentiment["pos"] && sentiment["neg"] >= sentiment["neutral"]) {
      resultDiv.innerHTML = `This is a positive account with a ${sentiment["neg"]} probability of being viewed positivity!`;
    } else {
     resultDiv.innerHTML = `This is a neutral account with a ${sentiment["neutral"]} probability of being viewed neutral!`;
    }

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
