Promise.all([
new Promise(resolve => setTimeout(()=> resolve(5), 3000))
new Promise(resolve, reject => setTimeout(()=> reject("Vaya"), 2000))
new Promise(resolve => setTimeout(()=> resolve(3), 1000))
new Promise(resolve => setTimeout(()=> resolve(4), 4000))
]).then(alert).catch(alert)