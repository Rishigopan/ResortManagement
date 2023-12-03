       <!-- Delete Modal -->
       <div class="modal fade delModal" id="delModal" tabindex="-1"  aria-labelledby="etrueeModalLabel" data-bs-keyboard="true" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered ">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title " id="exampleModalLabel">Delete Confirmation</h5>
                    </div>
                    <div class="modal-body">
                        <h4 class="text-center">Do you want to delete this Record?</h4>
                        <div class="text-center mt-3">
                            <form class="deletedata" id="delete_data" novalidate>
                                <input type="number" hidden  id="delete_id">
                                <button type="submit" id="confirmYes" class="btn btn-primary me-5">Yes</button>
                                <button type="button" id="confirmNo" class="btn btn-secondary ms-5" data-bs-dismiss="modal">No</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Response Modal -->
        <div class="modal fade ResponseModal" id="ResponseModal" tabindex="-1"  data-bs-keyboard="true" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-sm ">
                <div class="modal-content responsepopup">
                    <div class="modal-body p-3 py-2">
                        <div class="text-center my-2" id="ResponseImage">

                        </div>
                        <h6 id="ResponseText" class="text-center mb-1"></h6>
                        <div class="text-center">
                            <button type="button" id="btnConfirm" style="display: none;" class="btn responsebtn mt-3 px-3 py-1" data-bs-dismiss="modal">Proceed</button>
                            <button type="button" id="btnClose" class="btn  responsebtn mt-3 px-3 py-1" data-bs-dismiss="modal">Okay</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>