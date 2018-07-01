let voteSlotOne = document.getElementById('vote_slot_1')
let voteSlotTwo = document.getElementById('vote_slot_2')
let voteSlotThree = document.getElementById('vote_slot_3')
let filledSlots = { slotOne: false, slotTwo: false, slotThree: false }
let votedDelegates = { delegateOne: '', delegateTwo: '', delegateThree: '' }

let voteDelegate = (elemID) => {
    let delName = $('#' + elemID).attr("name")
    let delMascot = $('#' + elemID).attr("mascot")
    if (delName != votedDelegates.delegateOne && delName != votedDelegates.delegateTwo && delName != votedDelegates.delegateThree) {
        if (filledSlots.slotOne == false) {
            $('#vote_tick_1').attr('src', 'assets/img/vote_tick.png')
            $('#delegate_name_1').text(delName)
            $('#delegate_mascot_1').text(delMascot)
            filledSlots.slotOne = true
            votedDelegates.delegateOne = delName
        } else if (filledSlots.slotTwo == false) {
            $('#vote_tick_2').attr('src', 'assets/img/vote_tick.png')
            $('#delegate_name_2').text(delName)
            $('#delegate_mascot_2').text(delMascot)
            filledSlots.slotTwo = true
            votedDelegates.delegateTwo = delName
        } else if (filledSlots.slotThree == false) {
            $('#vote_tick_3').attr('src', 'assets/img/vote_tick.png')
            $('#delegate_name_3').text(delName)
            $('#delegate_mascot_3').text(delMascot)
            filledSlots.slotThree = true
            votedDelegates.delegateThree = delName
        } else {
            alert('You Have Already Selected 3 Delegates. If You wish to selct different contestants, please click on Cancel button')
        }
    } else {
        alert('You cannot vote for the same delegate more than once. Consider Liking instead. Its Unlimited!')
    }
    console.log(delName + '  ' + delMascot)
}

let clearSelection = () => {
    $('#vote_tick_1').attr('src', 'assets/img/vote_no_tick.png')
    $('#delegate_name_1').text('')
    $('#delegate_mascot_1').text('')
    $('#vote_tick_2').attr('src', 'assets/img/vote_no_tick.png')
    $('#delegate_name_2').text('')
    $('#delegate_mascot_2').text('')
    $('#vote_tick_3').attr('src', 'assets/img/vote_no_tick.png')
    $('#delegate_name_3').text('')
    $('#delegate_mascot_3').text('')
    filledSlots.slotOne = false
    votedDelegates.delegateOne = ''
    filledSlots.slotTwo = false
    votedDelegates.delegateTwo = ''
    filledSlots.slotThree = false
    votedDelegates.delegateThree = ''
}