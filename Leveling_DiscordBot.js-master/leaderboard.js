const Command = require("../modules/Command.js");
const dl = require('discord-leveling');

class leaderboard extends Command {
  constructor(client) {
    super(client, {
      name = "leaderboard",
      description = "Donne le classement des personnes les plus actives sur le serveur.",
      category = "Level",
      permLevel = "Utilisateur"
    });
  }

  async run(message, client) {
           try {
            if (message.mentions.users.first()) {
 
                var output = await dl.Leaderboard({
                  search: message.mentions.users.first().id
                })
                message.channel.send(`The user ${message.mentions.users.first().tag} is number ${output.placement} on my leaderboard!`);
            
                //Searches for the top 3 and outputs it to the user.
              } else {
            
                dl.Leaderboard({
                  limit: 3
                }).then(async users => { //make sure it is async
            
                  var firstplace = await client.fetchUser(users[0].userid) //Searches for the user object in discord for first place
                  var secondplace = await client.fetchUser(users[1].userid) //Searches for the user object in discord for second place
                  var thirdplace = await client.fetchUser(users[2].userid) //Searches for the user object in discord for third place
            
                  message.channel.send(`My leaderboard:
            
            1 - ${firstplace.tag} : ${users[0].level} : ${users[0].xp}
            2 - ${secondplace.tag} : ${users[1].level} : ${users[1].xp}
            3 - ${thirdplace.tag} : ${users[2].level} : ${users[2].xp}`)
            
                })
              }
           } catch (e) {
             console.log(e);
           }
          }
}
module.exports = nomdelacommande