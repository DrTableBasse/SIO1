var profile = await dl.Fetch(message.author.id)
  dl.AddXp(message.author.id, 10)
  if (profile.xp + 10 > 100) {
    await dl.AddLevel(message.author.id, 1)
    await dl.SetXp(message.author.id, 0)
    message.reply(`Vous venez de level up!! Vous êtes maintenant level: ${profile.level + 1}`);
  }
//repeat these lines for any role. 
// You can change the number of what you want, level 1 -> role1 eg....
//petitdejeune, deujeune, gouter and Dîner are name role
  if (profile.level +1 === 1) {
      let petitdejeune = message.guild.roles.find(r => r.name === "role1");
    message.member.addRole(petitdejeune.id)
  } else if (profile.level + 1 === 10) {
    let dejeune = message.guild.roles.find(r => r.name === "role2");
    message.member.addRole(dejeune.id)
  } else if (profile.level + 1 === 20) {
    let gouter = message.guild.roles.find(r => r.name === "role3");
    message.member.addRole(gouter.id)
  } else if (profile.level + 1 === 50) {
    let Dîner = message.guild.roles.find(r => r.name === "role4");
    message.member.addRole(gouter.id)
  }


